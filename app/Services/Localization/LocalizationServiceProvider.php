<?php
namespace App\Services\Localization;

use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    public function register()
    {
        parent::register();

        $this->app->bind('Localization', Localization::class);
    }
}