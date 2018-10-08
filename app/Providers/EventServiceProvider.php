<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        //Log in success listener
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LoginSuccessListener',
        ],
        //Logout success listener
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\LogoutSuccessListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
