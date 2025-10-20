<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            Forms\Components\TextInput::make('first_name')
                ->label('First Name')
                ->required()
                ->maxLength(50),
            Forms\Components\TextInput::make('last_name')
                ->label('Last Name')
                ->required()
                ->maxLength(50),
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('mobile')
                ->label('Mobile')
                ->tel()
                ->required()
                ->maxLength(15),
            Forms\Components\DatePicker::make('date')
                ->label('Date')
                ->required()
                ->minDate(now())
                ->maxDate(now()->addDays(30)),
            Forms\Components\TimePicker::make('time')
                ->label('Time')
                ->required(),

            //booking message
            Forms\Components\Textarea::make('note')
                ->label('Message')
                ->required()
                ->maxLength(300),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->searchable()-> sortable(),
                Tables\Columns\TextColumn::make('first_name')->label('First Name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->label('Last Name')->searchable(),
                //Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                //Tables\Columns\TextColumn::make('mobile')->label('Mobile')->searchable(),
                Tables\Columns\TextColumn::make('date')->label('Date')->searchable(),
                Tables\Columns\TextColumn::make('time')->label('Time')->searchable(),
                //created at
                
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
