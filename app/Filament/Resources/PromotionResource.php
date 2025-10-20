<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionResource\Pages;
use App\Filament\Resources\PromotionResource\RelationManagers;
use App\Models\Promotion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// Removed unused import for NumberColumn
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromotionResource extends Resource
{
    protected static ?string $model = Promotion::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationGroup = 'Store Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('promotions') // Directory to store the images
                ->nullable(),
            Forms\Components\Select::make('status')
                ->options([
                    0 => 'Inactive',
                    1 => 'Active',
                ])
                ->required(),
            Forms\Components\DateTimePicker::make('start_date')
                ->required(),
            Forms\Components\DateTimePicker::make('end_date')
                ->required(),
            Forms\Components\Textarea::make('description')
                ->nullable(),
            Forms\Components\TextInput::make('promo_code')
                ->label('Promo Code')
                ->unique(Promotion::class, 'promo_code')
                ->nullable(),
            Forms\Components\TextInput::make('discount')
                ->numeric()
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('title')
                //     ->searchable(),
                // Tables\Columns\ImageColumn::make('image')
                //     ->circular(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                //status: 0 = inactive, 1 = active
                Tables\Columns\TextColumn::make('promo_code')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->getStateUsing(function ($record) {
                        return $record->status == 1 ? 'Active' : 'Inactive';
                    })
                    ->colors([
                        'success' => 'Active', // Green for active
                        'danger' => 'Inactive', // Red for inactive
                    ]),
                Tables\Columns\TextColumn::make('start_date')
                    ->sortable()
                    ->dateTime()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->sortable()
                    ->dateTime()
                    ->toggleable(),
                // Tables\Columns\TextColumn::make('description')
                //     ->searchable()
                //     ->toggleable(),
                
                Tables\Columns\TextColumn::make('discount')
                    ->sortable()
                    ->toggleable(),

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
            'index' => Pages\ListPromotions::route('/'),
            'create' => Pages\CreatePromotion::route('/create'),
            'edit' => Pages\EditPromotion::route('/{record}/edit'),
        ];
    }
}
