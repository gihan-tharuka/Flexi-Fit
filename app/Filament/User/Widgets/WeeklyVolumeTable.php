<?php

namespace App\Filament\User\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ExerciseLog;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class WeeklyVolumeTable extends BaseWidget
{
    protected function getTableHeading(): string
    {
        return 'My Progress';
    }

    public function table(Table $table): Table
    {
        $now = Carbon::now();
        $userId = Auth::id(); // Get the logged-in user's ID

        // Fetch the weekly volumes for each unique exercise using conditional aggregation
        $weeklyVolumesQuery = ExerciseLog::query()
            ->select('exercise_logs.exercise_name', DB::raw('exercise_logs.exercise_name as id'))
            ->selectRaw("
                SUM(CASE WHEN set_logs.created_at BETWEEN ? AND ? THEN set_logs.reps * set_logs.weight ELSE 0 END) AS week_0_volume,
                SUM(CASE WHEN set_logs.created_at BETWEEN ? AND ? THEN set_logs.reps * set_logs.weight ELSE 0 END) AS week_1_volume,
                SUM(CASE WHEN set_logs.created_at BETWEEN ? AND ? THEN set_logs.reps * set_logs.weight ELSE 0 END) AS week_2_volume,
                SUM(CASE WHEN set_logs.created_at BETWEEN ? AND ? THEN set_logs.reps * set_logs.weight ELSE 0 END) AS week_3_volume
            ", [
                $now->copy()->startOfWeek(),
                $now->copy()->endOfWeek(),
                $now->copy()->subWeek()->startOfWeek(),
                $now->copy()->subWeek()->endOfWeek(),
                $now->copy()->subWeeks(2)->startOfWeek(),
                $now->copy()->subWeeks(2)->endOfWeek(),
                $now->copy()->subWeeks(3)->startOfWeek(),
                $now->copy()->subWeeks(3)->endOfWeek(),
            ])
            ->join('set_logs', 'set_logs.exercise_log_id', '=', 'exercise_logs.id')
            ->join('workout_logs', 'exercise_logs.workout_log_id', '=', 'workout_logs.id') // Join with workout_logs
            ->where('workout_logs.user_id', $userId) // Filter by logged-in user's ID from workout_logs
            ->groupBy('exercise_logs.exercise_name');

        return $table
            ->query($weeklyVolumesQuery)
            ->columns([
                TextColumn::make('exercise_name')
                    ->label('Exercise')
                    ->searchable(),

                TextColumn::make('week_0_volume')
                    ->label('This Week')
                    ->formatStateUsing(fn($state) => (int)($state ?? 0))
                    ->color(fn($record) => $this->compareVolumes($record->week_0_volume, $record->week_1_volume)),

                TextColumn::make('week_1_volume')
                    ->label('Last Week')
                    ->formatStateUsing(fn($state) => (int)($state ?? 0))
                    ->color(fn($record) => $this->compareVolumes($record->week_1_volume, $record->week_2_volume)),

                TextColumn::make('week_2_volume')
                    ->label('2 Weeks Ago')
                    ->formatStateUsing(fn($state) => (int)($state ?? 0))
                    ->color(fn($record) => $this->compareVolumes($record->week_2_volume, $record->week_3_volume)),

                TextColumn::make('week_3_volume')
                    ->label('3 Weeks Ago')
                    ->formatStateUsing(fn($state) => (int)($state ?? 0)),
            ]);
    }

    private function compareVolumes($currentVolume, $previousVolume)
    {
        return $currentVolume > $previousVolume ? 'success' : 'danger';
    }
}