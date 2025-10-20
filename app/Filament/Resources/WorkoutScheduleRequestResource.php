<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkoutScheduleRequestResource\Pages;
use App\Filament\Resources\WorkoutScheduleRequestResource\RelationManagers;
use App\Models\WorkoutScheduleRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Actions\ButtonAction;

class WorkoutScheduleRequestResource extends Resource
{
    protected static ?string $model = WorkoutScheduleRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';

    protected static ?string $pluralLabel = 'Schedule Requests';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required(),

                Forms\Components\Select::make('fitness_goal')
                    ->label('Fitness Goal')
                    ->options([
                        'weight_loss' => 'Weight Loss',
                        'weight_gain' => 'Weight Gain',
                        'strength_training' => 'Strength Training',
                        'cardio_training' => 'Cardio Training',
                        'maintain' => 'Maintain',
                        'competition_prep' => 'Competition Prep',
                    ])
                    ->required(),

                Forms\Components\Select::make('workout_frequency')
                    ->label('Workout Frequency (per week)')
                    ->options([
                        1 => '1 day',
                        2 => '2 days',
                        3 => '3 days',
                        4 => '4 days',
                        5 => '5 days',
                        6 => '6 days',
                        7 => '7 days',
                    ])
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending')
                    ->required(),

                Forms\Components\Textarea::make('notes')
                    ->label('Additional Notes')
                    ->rows(3),
            ])
            ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fitness_goal')
                    ->label('Fitness Goal')
                    ->formatStateUsing(fn($state) => ucwords(str_replace('_', ' ', $state))),
                // Tables\Columns\TextColumn::make('workout_frequency')
                //     ->label('Frequency'),
                // Tables\Columns\TextColumn::make('notes')
                //     ->label('Notes')
                //     ->limit(10),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Requested On')
                    ->dateTime(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    // ->enum([
                    //     'pending' => 'Pending',
                    //     'approved' => 'Approved',
                    //     'rejected' => 'Rejected',
                    // ])
                    ->getStateUsing(function ($record) {
                        switch ($record->status) {
                            case 'pending':
                                return 'Pending';
                            case 'approved':
                                return 'Approved';
                            case 'rejected':
                                return 'Rejected';
                            default:
                                return 'Unknown';
                        }
                    })
                    ->colors([
                        'primary' => 'Pending',
                        'success' => 'Approved',
                        'danger' => 'Rejected',
                    ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('createSchedule')
                ->label('Assign')
                ->icon('heroicon-o-plus')
                // ->button()
                ->url(fn() => url('/admin/schedule-assignments/create')),
                //Optional: Opens in a new tab
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
            'index' => Pages\ListWorkoutScheduleRequests::route('/'),
            'create' => Pages\CreateWorkoutScheduleRequest::route('/create'),
            'edit' => Pages\EditWorkoutScheduleRequest::route('/{record}/edit'),
        ];
    }
}