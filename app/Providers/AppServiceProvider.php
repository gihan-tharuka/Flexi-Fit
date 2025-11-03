<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\MembershipPlan;
use App\Observers\Bookingobserver;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Livewire\Livewire;
use Illuminate\Http\Request;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Request::setTrustedProxies(
        [ $this->app->make('request')->getClientIp() ],
        Request::HEADER_X_FORWARDED_ALL
        );

        Booking::observe(BookingObserver::class);


    }
}
