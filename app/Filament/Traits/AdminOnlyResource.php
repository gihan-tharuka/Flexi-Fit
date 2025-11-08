<?php

namespace App\Filament\Traits;

use App\Enums\Role;

trait AdminOnlyResource
{
    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role === Role::admin;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->check() && auth()->user()->role === Role::admin;
    }
}
