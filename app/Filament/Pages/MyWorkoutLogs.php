<?php

namespace App\Filament\Pages;

use App\Enums\Role;
use Filament\Pages\Page;

class MyWorkoutLogs extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'My Account';

    protected static ?int $navigationSort = 6;

    protected static string $view = 'filament.pages.my-workout-logs';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->check() && auth()->user()->role !== Role::admin;
    }

    public static function canAccess(): bool
    {
        return auth()->check();
    }
}
