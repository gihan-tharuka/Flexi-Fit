<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\MyOrderResource\Pages;
use App\Filament\User\Resources\MyOrderResource\RelationManagers;
use App\Models\MyOrder;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MyOrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    //custome name for resource in navigation
    protected static ?string $pluralLabel = 'My Orders';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('Order ID')->sortable(),
                TextColumn::make('first_name')->label('First Name')->sortable(),
                TextColumn::make('phone')->label('Phone'),

                BadgeColumn::make('Order_status')
                    ->label('Order Status')
                    ->formatStateUsing(fn ($state) => match($state) {
                        0 => 'Pending',
                        1 => 'Confirmed',
                        2 => 'Cancelled',
                    })
                    ->color(fn ($state) => match($state) {
                        0 => 'warning',
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
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Action::make('receipt')
                    ->label('Receipt')
                    ->url(fn(Order $record) => route('receipt.show', $record->id)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                // ✅ Custom "New Order" button to redirect to /products
                Tables\Actions\Action::make('New Order')
                    ->label('Create Order')
                    ->url(url('/products')) // Redirect to /products instead of the Filament form
                    ->color('primary'),
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
            'index' => Pages\ListMyOrders::route('/'),
            'create' => Pages\CreateMyOrder::route('/create'),
            'edit' => Pages\EditMyOrder::route('/{record}/edit'),
            'receipt' => Pages\CustomReceiptPage::route('/{record}'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function getCreateUrl(): string
    {
        return url('/products'); // Redirects to the products page
    }

}
