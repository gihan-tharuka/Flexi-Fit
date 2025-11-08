<?php

namespace App\Filament\Pages;

use App\Enums\Role;
use Filament\Pages\Page;

class MyProfile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static string $view = 'filament.pages.my-profile';

    protected static ?string $navigationLabel = 'My Profile';

    protected static ?string $title = 'My Profile';

    protected static ?string $navigationGroup = 'Account';

    protected static ?int $navigationSort = 1;

    public static function shouldRegisterNavigation(): bool
    {
        // Show to customers and suppliers, but not admins (they have Users resource)
        return auth()->check() && auth()->user()->role !== Role::admin;
    }

    public static function canAccess(): bool
    {
        // All authenticated users can access
        return auth()->check();
    }
}
