<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\HasManyRepeater;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Schedule Management';

    public static function form(Form $form): Form
    {
        // Predefined list of common exercises
    $exercises = [
        'Bench Press',
        'Squat',
        'Deadlift',
        'Overhead Press',
        'Barbell Row',
        'Pull-Up',
        'Push-Up',
        'Dumbbell Curl',
        'Triceps Dip',
        'Lunges',
        'Leg Press',
        'Lat Pulldown',
        'Shoulder Press',
        'Bicep Curl',
        'Plank',
        'Leg Raise',
        'Incline Bench Press',
        'Chest Fly',
        'Hammer Curl',
        'Front Squat',
        'Romanian Deadlift',
        'Cable Crossover',
        'Seated Row',
        'Face Pull',
        'Side Lateral Raise',
        'Calf Raise',
        'Dumbbell Shrug',
        'Reverse Fly',
        'Hanging Leg Raise',
        'Russian Twist',
        'Mountain Climbers',
        'Burpees',
        'Kettlebell Swing',
        'Arnold Press',
        'Zercher Squat',
        'Good Morning',
        'Hip Thrust',
        'Farmer’s Walk',
        'T-Bar Row',
        'Dumbbell Pullover',
    ];
        return $form
            ->schema([
            TextInput::make('name')
                ->placeholder('Beginner 1 day plan')
                ->required()
                ->unique(Schedule::class, 'name'),
            HasManyRepeater::make('workouts')
                ->relationship('workouts')  // Link to workouts
                ->schema([
                    TextInput::make('name')
                        ->placeholder('Day 1 Upper Body')
                        ->label('Workout Name'),

                    // ADD THIS NEW TEXTAREA FOR NOTES
                    Forms\Components\Textarea::make('notes')
                        ->label('Workout Notes')
                        ->placeholder('Enter any additional notes about this workout - Warmup, warmdown, etc.')
                        ->columnSpanFull(), // Makes it take full width
                        
                    HasManyRepeater::make('exercises')
                        ->relationship('exercises')  // Link to exercises
                        ->schema([
                            TextInput::make('name')
                                ->label('Exercise Name')
                                ->required()
                                ->datalist($exercises)
                                ->placeholder('Start typing... (e.g. Squat)'),
                            TextInput::make('sets')->label('Sets'),
                            TextInput::make('reps')
                                ->label('Reps')
                                ->placeholder('12,10,8,6'),
                            TextInput::make('rest_time')->label('Rest Time (in seconds)'),
                        ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
    
            ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                ->url(fn(Schedule $record) => route('schedules.show', $record->id)), // Redirect to the custom Blade view,
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}