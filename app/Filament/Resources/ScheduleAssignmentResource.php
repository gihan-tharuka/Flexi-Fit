<?php

namespace App\Filament\Resources;
use App\Models\User;
use App\Filament\Resources\ScheduleAssignmentResource\Pages;
use App\Filament\Resources\ScheduleAssignmentResource\RelationManagers;
use App\Models\ScheduleAssignment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleAssignmentResource extends Resource
{
    protected static ?string $model = ScheduleAssignment::class;
    // protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    // protected static ?string $pluralLabel = 'Schedule Assignments'; // Plural
    protected static ?string $navigationGroup = 'Schedule Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            Select::make('user_id')
            ->label('User')
            ->relationship('user', 'name')  // Load users by name
            ->required(),

            Select::make('schedule_id')
            ->label('Schedule')
            ->relationship('schedule', 'name')  // Load schedules by name
            ->required(),

            Select::make('status')
                ->label('Status')
                ->options([
                    '1' => 'Active',
                    '0' => 'Completed',
                    // 'pending' => 'Pending',
                ])
                ->required(),
            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            Tables\Columns\TextColumn::make('user.name')->label('User')->searchable(),
            Tables\Columns\TextColumn::make('schedule.name')->label('Schedule'),
            //assigned at column
            Tables\Columns\TextColumn::make('created_at')
                ->date()
                ->sortable()->label('Assigned At'),

                BadgeColumn::make('status')
                    ->label('Schedule status')
                    ->formatStateUsing(fn ($state) => match($state) {
                        '1' => 'Active',
                        '0' => 'Completed',

                    })
                    ->color(fn ($state) => match($state) {
                        '1' => 'primary',
                        '0' => 'success',
                    }),
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
            'index' => Pages\ListScheduleAssignments::route('/'),
            'create' => Pages\CreateScheduleAssignment::route('/create'),
            'edit' => Pages\EditScheduleAssignment::route('/{record}/edit'),
        ];
    }
}
