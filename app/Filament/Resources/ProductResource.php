<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\product;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = product::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationGroup = 'Store Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Product Name'),
                TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->label('Price'),
                TextInput::make('discount_price')
                    ->numeric()
                    ->label('Discount Price')
                ->required(),
                TagsInput::make('tags')
                    ->label('Tags')
                    ->nullable() ->separator(','),
                    TextInput::make('stock_quantity')
                        ->numeric()
                        ->label('Stock Quantity'),
                Grid::make(3) // 3 columns for these 3 fields
                ->schema([


                    Toggle::make('in_stock')
                        ->label('In Stock'),

                    Toggle::make('on_sale')
                        ->label('On Sale'),

                    Toggle::make('bestselling')
                        ->label('Best Selling'),
                ]),

                // Dropdown for Product Category
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->required(),

                // Dropdown for Product Brand
                Select::make('brand_id')
                    ->label('Brand')
                    ->relationship('brand', 'name')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->columnSpan('full') // Makes the RichEditor take the full width
                    ->required(),
                SpatieMediaLibraryFileUpload::make('product_image')
                    ->collection('product_image')
                    ->label('Product Image'),

                SpatieMediaLibraryFileUpload::make('nutrition_label')
                    ->collection('nutrition_label')
                    ->label('Nutritional Facts Label')
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Product Name')->searchable(),
                Tables\Columns\TextColumn::make('price')->label('Price'),
                Tables\Columns\BooleanColumn::make('in_stock')->label('In Stock'),
                Tables\Columns\BooleanColumn::make('on_sale')->label('On Sale'),
                Tables\Columns\BooleanColumn::make('bestselling')->label('Best Selling'),
                Tables\Columns\TextColumn::make('stock_quantity')->label('Stock')->sortable(),
            ])
            ->filters([
                //
            Tables\Filters\Filter::make('in_stock')
                ->label('In Stock')
                ->query(fn (Builder $query): Builder => $query->where('in_stock', true)),

            Tables\Filters\Filter::make('on_sale')
                ->label('On Sale')
                ->query(fn (Builder $query): Builder => $query->where('on_sale', true)),

            Tables\Filters\Filter::make('bestselling')
                ->label('Best Selling')
                ->query(fn (Builder $query): Builder => $query->where('bestselling', true)),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
