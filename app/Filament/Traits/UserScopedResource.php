<?php

namespace App\Filament\Traits;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Builder;

trait UserScopedResource
{
    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role !== Role::admin;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->check() && auth()->user()->role !== Role::admin;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    public static function canCreate(): bool
    {
        return true;
    }
}
