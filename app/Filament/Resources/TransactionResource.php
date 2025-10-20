<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Financial Management';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //         Forms\Components\TextInput::make('amount')
    //             ->required(),
    //         Forms\Components\Select::make('type')
    //             ->options([
    //                 'income' => 'Income',
    //                 'expense' => 'Expense',
    //             ])
    //             ->required(),
    //         Forms\Components\TextInput::make('description')
    //             ->required(),
    //         Forms\Components\Select::make('category_id')
    //             ->relationship('revenuecategory', 'name')
    //             ->nullable(),
    //         Forms\Components\DatePicker::make('date')
    //             ->required(),

    //         ]);
    // }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                ->required()
                    ->numeric(), // Ensure the amount is numeric

                Forms\Components\Select::make('payment_method')
                ->label('Payment Method')
                    ->options([
                        'cash' => 'Cash',
                        'card' => 'Card',
                        'bank_transfer' => 'Bank Transfer',
                    ])
                    ->required()
                    ->default('cash'), // Default to cash

                Forms\Components\Select::make('type')
                ->options([
                    'income' => 'Income',
                    'expense' => 'Expense',
                ])
                    ->required()
                    ->reactive() // Makes the field listen for changes
                    ->afterStateUpdated(fn(callable $set) => $set('category_id', null)), // Reset category_id when type changes

                Forms\Components\TextInput::make('description')
                ->required()
                    ->maxLength(255), // Limit description length

                Forms\Components\Select::make('category_id')
                ->label('Category')
                ->relationship(
                    'revenuecategory',
                    'name',
                    fn($query, $get) =>
                    $query->where('type', $get('type'))
                ) // Filters categories based on the selected type
                    ->nullable()
                    ->requiredWith('type'), // Require category if type is set

                Forms\Components\DatePicker::make('date')
                ->required()
                    ->default(now()), // Default to today's date
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('date')->date()->sortable(),
            Tables\Columns\TextColumn::make('amount')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('type')->sortable(),
            Tables\Columns\BadgeColumn::make('type')
                ->label('Type')
                ->getStateUsing(function ($record) {
                    return $record->type == 'income' ? 'Income' : 'Expense';
                })
                ->colors([
                    'success' => 'Income', // Green for income
                    'danger' => 'Expense',  // Red for expense
                ]),
           /// Tables\Columns\TextColumn::make('description')->searchable(),
            Tables\Columns\TextColumn::make('revenuecategory.name')->label('Category'),
           
            ])
            ->filters([
            Tables\Filters\SelectFilter::make('type')
                ->options([
                    'income' => 'Income',
                    'expense' => 'Expense',
                ])
                ->label('Transaction Type'),
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
                FilamentExportBulkAction::make('export')
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}