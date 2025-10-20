<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderImageResource\Pages;
use App\Filament\Resources\SliderImageResource\RelationManagers;
use App\Models\SliderImage;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderImageResource extends Resource
{
    protected static ?string $model = SliderImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $pluralLabel = 'Hero Banner';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make('slider_images')
                    ->collection('slider_images')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

               ->columns([
                   Tables\Columns\ImageColumn::make('slider_images')
                       ->label('slider_images')
                       ->getStateUsing(fn($record) => $record->getFirstMediaUrl('slider_images')),


                     Tables\Columns\TextColumn::make('created_at')
                          ->label('Created At')
                          ->dateTime('d/m/Y'),
                        Tables\Columns\TextColumn::make('updated_at')
                          ->label('Updated At')
                          ->dateTime('d/m/Y'),


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
            'index' => Pages\ListSliderImages::route('/'),
            'create' => Pages\CreateSliderImage::route('/create'),
            'edit' => Pages\EditSliderImage::route('/{record}/edit'),
        ];
    }
}
