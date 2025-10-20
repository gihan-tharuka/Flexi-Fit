<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\MembershipPaymentResource\Pages;
use App\Filament\User\Resources\MembershipPaymentResource\RelationManagers;
use App\Models\MembershipPayment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MembershipPaymentResource extends Resource
{
    protected static ?string $model = MembershipPayment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    //custome name for resource in navigation
    protected static ?string $pluralLabel = 'My Payments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('payment_date')
                ->required(),
                Forms\Components\Select::make('payment_method')
                ->options([
                    'cash' => 'Cash',
                    'credit_card' => 'Credit Card',
                    'bank_transfer' => 'Bank Transfer',

                ])
                    ->required()
                    ->label('Payment Method'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            // Tables\Columns\TextColumn::make('user.name'),
            Tables\Columns\TextColumn::make('user.membership_id')->label('Membership')->searchable(),
            Tables\Columns\TextColumn::make('amount')->searchable(),
            Tables\Columns\TextColumn::make('payment_date')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('payment_method'),

            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\ViewAction::make(),
                // ->url(fn(MembershipPayment $record) => route('membership.show', $record->id)), // Redirect to the custom Blade view,
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListMembershipPayments::route('/'),
            'view' => Pages\CustomPaymentPage::route('/{record}'), // Add this line
            // 'create' => Pages\CreateMembershipPayment::route('/create'),
            // 'edit' => Pages\EditMembershipPayment::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function canCreate(): bool
    {
        return false; // Disable the creation of new membership payments
    }
}