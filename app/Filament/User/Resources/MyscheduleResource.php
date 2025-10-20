<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\MyscheduleResource\Pages;
use App\Filament\User\Resources\MyscheduleResource\RelationManagers;
use App\Models\Myschedule;
use App\Models\ScheduleAssignment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MyscheduleResource extends Resource
{
    protected static ?string $model = ScheduleAssignment::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $pluralLabel = 'My Schedules';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('schedule.name')->label('Schedule Name'),
                Tables\Columns\TextColumn::make('created_at')->label('Assigned at')->date(),

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
                Tables\Actions\Action::make('Change Status')
                    ->label('Update Status')
                    ->form([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'active' => 'Active',
                                'completed' => 'Completed',
                            ])
                            ->required(),
                    ])
                    ->action(function ($record, $data) {
                        $record->status = $data['status'];
                        $record->save();
                    })
                    ->modalHeading('Change Schedule Status'),

                Tables\Actions\EditAction::make(),


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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Auth::id());
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMyschedules::route('/'),
            'create' => Pages\CreateMyschedule::route('/create'),
            'edit' => Pages\EditMyschedule::route('/{record}/edit'),
        ];
    }
}
