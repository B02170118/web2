<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\InterFaces\PostInterFaces;
use App\Models\Repository\PostRepository;
use App\Models\Repository\UserRepository;
use App\Models\InterFaces\UserInterFaces;
use App\Models\Repository\SystemRepository;
use App\Models\InterFaces\SystemInterFaces;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
