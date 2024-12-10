<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;


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
        JsonResource::withoutWrapping();

        if (!App::runningInConsole()) {
            $lang = request('locale');
            if (strlen($lang) === 2 && in_array($lang, [ 'fa', 'en'])) {
                App::setLocale($lang);
            }
        }

    }
}
