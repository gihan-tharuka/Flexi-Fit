<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\product;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Store Management';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('Order ID')
                    ->disabled(),

                Forms\Components\TextInput::make('first_name')
                    ->label('First Name'),

                Forms\Components\TextInput::make('last_name')
                    ->label('Last Name'),

                Forms\Components\TextInput::make('phone')
                    ->label('Phone'),

                Forms\Components\TextInput::make('email')
                    ->label('Email'),

                Forms\Components\TextInput::make('address')
                    ->label('Address'),

                Forms\Components\TextInput::make('city')
                    ->label('City'),

                Forms\Components\TextInput::make('state')
                    ->label('State'),

                Forms\Components\TextInput::make('zip')
                    ->label('Zip Code'),

                Forms\Components\Textarea::make('notes')
                    ->label('Notes')
                    ->rows(3),

                Select::make('payment_method')
                    ->label('Payment Method')
                    ->options([
                        'Cash on Delivery' => 'Cash on Delivery',
                        'Bank Transfer' => 'Bank Transfer',
                        'Koko' => 'Koko',
                    ])
                    ->default('Cash on Delivery'),

                SpatieMediaLibraryFileUpload::make('payment_slip')
                    ->collection('bank_slips')
                    ->label('Payment Slip')
                    ->enableDownload()
                    ->enableOpen()
                    ->visible(fn ($get) => $get('payment_method') === 'Bank Transfer'),


                // Dropdown for Order Status
                Select::make('Order_status')
                    ->label('Order Status')
                    ->options([
                        0 => 'Processing',
                        1 => 'Delivered',
                        2 => 'Cancelled',
                    ])
                    ->default(0),

                // Dropdown for Payment Status
                Select::make('status')
                    ->label('Payment Status')
                    ->options([
                        0 => 'Pending',
                        1 => 'Confirmed',
                        2 => 'Denied',
                    ])
                    ->default(0),


                Repeater::make('order_items')
                    ->label('Order Items')
                    ->relationship('order_product')
                    ->schema([
                        Select::make('product_id')
                            ->label('Product')
                            ->options(Product::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                $product = Product::find($state);
                                if ($product) {
                                    $set('price', $product->price);
                                    $quantity = $get('quantity') ?: 1;
                                    $lineTotal = $product->price * $quantity;
                                    $set('total', $lineTotal);

                                    // Update the order total
                                    $set('../../total', $get('../../total', 0) + $lineTotal - ($get('total') ?? 0));
                                }
                            }),

                        TextInput::make('quantity')
                            ->label('Quantity')
                            ->numeric()
                            ->minValue(1)
                            ->default(1)
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                $productId = $get('product_id');
                                if ($productId) {
                                    $product = Product::find($productId);
                                    if ($product) {
                                        $quantity = (int)$state ?: 1;
                                        $oldTotal = $get('total') ?? 0;
                                        $newTotal = $product->price * $quantity;
                                        $set('total', $newTotal);

                                        // Update the order total
                                        $set('../../total', $get('../../total', 0) + $newTotal - $oldTotal);
                                    }
                                }
                            }),

                        TextInput::make('price')
                            ->label('Unit Price')
                            ->numeric()
                            ->disabled()
                            ->dehydrated(),

                        TextInput::make('total')
                            ->label('Line Total')
                            ->numeric()
                            ->disabled()
                            ->dehydrated(),
                    ])
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => Product::find($state['product_id'])?->name ?? 'New Item')
                    ->addActionLabel('Add Product')
                    ->defaultItems(1)
                    ->columnSpan('full')
                    ->createItemButtonLabel('Add Product')

                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                        // Recalculate total whenever items change
                        $grandTotal = array_reduce($state ?? [], function ($carry, $item) {
                            return $carry + ($item['total'] ?? 0);
                        }, 0);
                        $set('total', $grandTotal);
                    }),

                TextInput::make('total')
                    ->label('Order Total')
                    ->numeric()
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->default(0),
            ]);




    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('created_at')
                    ->date()
                    ->label('Order Date')
                    ->sortable(),
                TextColumn::make('first_name')->label('Name')->sortable()->searchable(),
                TextColumn::make('payment_method')->label('Payment')->sortable()->searchable(),


                BadgeColumn::make('Order_status')
                    ->label('Order Status')
                    ->formatStateUsing(fn ($state) => match($state) {
                        0 => 'Processing',
                        1 => 'Delivered',
                        2 => 'Cancelled',
                    })
                    ->color(fn ($state) => match($state) {
                        0 => 'primary',
                        1 => 'success',
                        2 => 'danger',
                    }),

                BadgeColumn::make('status')
                    ->label('Payment Status')
                    ->formatStateUsing(fn ($state) => match($state) {
                        0 => 'Pending',
                        1 => 'Confirmed',
                        2 => 'Denied',
                    })
                    ->color(fn ($state) => match($state) {
                        0 => 'warning',
                        1 => 'success',
                        2 => 'danger',
                    }),


            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                Action::make('receipt')
                    ->label('Receipt')
                    ->url(fn(Order $record) => route('receipt.show', $record->id)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                FilamentExportBulkAction::make('export')
            ])
            //filters
            ->filters([
                
                Tables\Filters\SelectFilter::make('Order_status')
                    ->label('Order Status')
                    ->options([
                        0 => 'Processing',
                        1 => 'Delivered',
                        2 => 'Cancelled',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->label('Payment Status')
                    ->options([
                        0 => 'Pending',
                        1 => 'Confirmed',
                        2 => 'Denied',
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
            'receipt' => Pages\CustomReceiptPage::route('/{record}'),

        ];
    }
}
