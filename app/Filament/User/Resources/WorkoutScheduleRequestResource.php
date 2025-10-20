<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\WorkoutScheduleRequestResource\Pages;
use App\Filament\User\Resources\WorkoutScheduleRequestResource\RelationManagers;
use App\Models\WorkoutScheduleRequest;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class WorkoutScheduleRequestResource extends Resource
{
    protected static ?string $model = WorkoutScheduleRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';

    protected static ?string $pluralLabel = 'Schedule Requests';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn () => auth()->id())
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

                Forms\Components\Textarea::make('notes')
                    ->label('Additional Notes')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            // Tables\Columns\TextColumn::make('user.name')
            //     ->label('User')
            //     ->searchable(),
            Tables\Columns\TextColumn::make('fitness_goal')
                ->label('Fitness Goal')
                ->formatStateUsing(fn($state) => ucwords(str_replace('_', ' ', $state))),
            Tables\Columns\TextColumn::make('workout_frequency')
            ->label('Frequency'),
            Tables\Columns\TextColumn::make('notes')
                ->label('Notes')
                ->limit(10),
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
                    'primary' => 'pending',
                    'success' => 'approved',
                    'danger' => 'rejected',
                ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
}