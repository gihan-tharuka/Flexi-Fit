<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class BlogResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->rules(['string', 'max:255'])
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->default('draft')
                    ->required(),

                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->placeholder('Enter the description here...')
                    ->columnSpan('full') // Makes the RichEditor take the full width
                    ->required()
                    ->rules(['string', 'min:10']), // Requires the description to be at least 10 characters

                Forms\Components\TagsInput::make('tags')
                    ->nullable()
                    ->separator(',')
                    ->rules(['array', 'max:10']), // Limits to 10 tags at maximum

                Forms\Components\DatePicker::make('publication_date')
                    ->default(now())
                    ->required()
                    ->rules(['date', 'after_or_equal:today']), // Ensures publication date is today or in the future

                Forms\Components\TextInput::make('meta_title')
                    ->nullable()
                    ->label('Meta Title')
                    ->rules(['string', 'max:60']),

                Forms\Components\TextInput::make('meta_keywords')
                    ->nullable()
                    ->label('Meta Keywords')
                    ->rules(['string', 'max:160']),

                Forms\Components\Textarea::make('meta_description')
                    ->nullable()
                    ->label('Meta Description')
                    ->rules(['string', 'max:160']),

                Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->collection('thumbnails')
                    // ->rules('image|max:2048')// Ensure the uploaded file is an image and limit the size to 2MB
                    ->rules(['image', 'mimes:jpg,jpeg,png', 'max:1024']) // Only accepts jpg, jpeg, png formats, with max size 1MB
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Title')->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->getStateUsing(fn($record) => $record->getFirstMediaUrl('thumbnails')),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->getStateUsing(function ($record) {
                        return $record->status === 'draft' ? 'Draft' : 'Published';
                    })
                    ->colors([
                        'gray' => 'Draft', // Green for active
                        'success' => 'Published',  // Red for inactive
                    ]),
                Tables\Columns\TextColumn::make('publication_date')->label('Date of publish')->sortable(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }

    public static function beforeSave($record): void
    {
        $record->user_id = Auth::id();
    }
}