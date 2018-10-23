<?php

namespace ConferenceRoomStatus\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'ConferenceRoomStatus\Services\Contracts\CalendarServiceInterface', 
            'ConferenceRoomStatus\Services\GoogleCalendar'
        );
    }
}
