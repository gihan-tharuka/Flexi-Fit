<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevenueCategoryResource\Pages;
use App\Filament\Resources\RevenueCategoryResource\RelationManagers;
use App\Models\RevenueCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RevenueCategoryResource extends Resource
{
    protected static ?string $model = RevenueCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Financial Management';

    protected static ?string $pluralLabel = 'Categories';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            Forms\Components\TextInput::make('name')
            ->required()
            ->unique(RevenueCategory::class, 'name'),
            Forms\Components\Select::make('type')
            ->options([
                'income' => 'Income',
                'expense' => 'Expense',
            ])
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('type')
                ->formatStateUsing(fn (string $state): string => $state === 'income' ? 'Income' : 'Expense'),

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
            'index' => Pages\ListRevenueCategories::route('/'),
            'create' => Pages\CreateRevenueCategory::route('/create'),
            'edit' => Pages\EditRevenueCategory::route('/{record}/edit'),
        ];
    }
}
