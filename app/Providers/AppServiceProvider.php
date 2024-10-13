<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Customer\WaCampaignRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(WaCampaignRepository::class, function ($app) {
        //     return new WaCampaignRepository();
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
