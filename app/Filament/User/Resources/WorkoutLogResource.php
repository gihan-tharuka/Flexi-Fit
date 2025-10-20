<?php

namespace App\Filament\User\Resources;

use Filament\Forms\Components\Grid;
use Filament\Infolists\Infolist;

use App\Filament\User\Resources\WorkoutLogResource\Pages;
use App\Filament\User\Resources\WorkoutLogResource\RelationManagers;
use App\Models\WorkoutLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\ScheduleAssignment;
use App\Models\Workout;
use Illuminate\Support\Facades\Auth;
use Filament\Infolists\Components\Text;

class WorkoutLogResource extends Resource
{
    protected static ?string $model = WorkoutLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Hidden::make('user_id')
            ->default(auth()->id()),
            DatePicker::make('workout_date')
            ->default(now())
            ->required(),

            // Select component for choosing a workout
            Select::make('workout_name') // Change here
                ->label('Select Workout')
                ->options(function () {
                    $user = auth()->user();

                    // Get all active schedule assignments for the logged-in user
                    $scheduleAssignments = ScheduleAssignment::where('user_id', $user->id)
                    ->where('status', 'active')
                    ->with('schedule.workouts') // Eager load the workouts for the schedules
                    ->get();

                    $workouts = collect();

                    // Loop through schedule assignments to gather the associated workouts
                    foreach ($scheduleAssignments as $assignment) {
                        $workouts = $workouts->merge($assignment->schedule->workouts);
                    }

                    return $workouts->pluck('name', 'name');  // Return workouts as id => name pairs
                })
                ->required(), // Make it required if necessary

            HasManyRepeater::make('exerciseLogs')->relationship('exerciseLogs')
            ->schema([
                Select::make('exercise_name') // Change here
                    ->label('Exercise')
                    ->options(function () {
                        $user = auth()->user();

                        // Get all active schedule assignments for the logged-in user
                        $scheduleAssignments = ScheduleAssignment::where('user_id', $user->id)
                            ->where('status', 'active')
                            ->with('schedule.workouts.exercises') // Eager load exercises for the workouts
                            ->get();

                        $exercises = collect();

                        // Loop through the schedule assignments and collect all exercises
                        foreach ($scheduleAssignments as $assignment) {
                            foreach ($assignment->schedule->workouts as $workout) {
                                $exercises = $exercises->merge($workout->exercises);
                            }
                        }

                        // Return exercises as id => name pairs
                        return $exercises->pluck('name', 'name');
                    })
                    ->required(), // Make it required if necessary

                HasManyRepeater::make('setLogs')->relationship('setLogs')
                    ->schema([
                        Forms\Components\Group::make()
                            ->extraAttributes(['class' => 'flex flex-row']) // flex-row on all screens
                            ->schema([
                                Grid::make([
                                    'default' => 2,
                                    'sm' => 2, // 2 columns on small screens and up
                                ])
                                    ->schema([
                                        TextInput::make('reps')
                                            ->numeric()
                                            ->required(),

                                        TextInput::make('weight')
                                            ->numeric()
                                            ->required(),
                                    ]),
                            ]),
                    ])
                    ->createItemButtonLabel('Add New Set')
        // Custom button name

        ])
            ->createItemButtonLabel('Add New Exercise') // Custom button name
            ->columns(2),
        ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            // ->query(fn(Builder $query) => $query->where('user_id', auth()->id())) // Filter by logged-in user
            ->columns([
                Tables\Columns\TextColumn::make('workout_name')->label('Workout Name'),
                Tables\Columns\TextColumn::make('created_at')->label('Date')->date()->searchable()->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            // ->url(fn($record) => route('custom-relation-page', $record->id)), // Redirect to the custom Blade view,
                // ->url(fn(WorkoutLog $record) => route('workout-log.show', $record->id)), // Redirect to the custom Blade view,
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

            ]);
    }




    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkoutLogs::route('/'),
            'create' => Pages\CreateWorkoutLog::route('/create'),
            'edit' => Pages\EditWorkoutLog::route('/{record}/edit'),
            'view' => Pages\CustomWorkoutLogPage::route('/{record}'), // Add this line
            // 'view' => Pages\ViewWorkoutLog::route('/{record}'), // Add this line
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
}
