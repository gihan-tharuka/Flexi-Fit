<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\MybookingsResource\Pages;
use App\Filament\User\Resources\MybookingsResource\RelationManagers;
use App\Models\Booking;
use App\Models\Mybookings;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MybookingsResource extends Resource
{
    protected static ?string $model = booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $pluralLabel = 'My Bookings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')->label('First Name'),
                Forms\Components\TextInput::make('last_name')->label('Last Name'),
                Forms\Components\TextInput::make('email')->label('Email'),
                Forms\Components\TextInput::make('mobile')->label('Mobile'),

                Forms\Components\DatePicker::make('date')
                    ->label('Date')
                    ->minDate(today()) // Prevent past dates
                    ->required(),

                Forms\Components\TimePicker::make('time')
                    ->label('Time')
                    ->required()
                    ->rule(function () {
                        return function (string $attribute, $value, \Closure $fail) {
                            $time = Carbon::parse($value);

                            // Define time limits
                            $minTime = Carbon::createFromTime(9, 0, 0);  // 9:00 AM
                            $maxTime = Carbon::createFromTime(22, 0, 0); // 10:00 PM

                            // Validate selected time
                            if ($time->lt($minTime) || $time->gt($maxTime)) {
                                $fail('The selected time must be between 9 AM and 10 PM.');
                            }
                        };
                    }),

                Forms\Components\RichEditor::make('message')
                    ->label('Massage')
                    ->placeholder('Enter the Message here...')
                    ->columnSpan('full')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('first_name')->label('First Name'),
                Tables\Columns\TextColumn::make('created_at')->label('Submitted On')->dateTime(),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('mobile')->label('Mobile'),
            ])


            ->filters([
                //
            ])
            ->actions([
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMybookings::route('/'),
            'create' => Pages\CreateMybookings::route('/create'),
            'edit' => Pages\EditMybookings::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
}
