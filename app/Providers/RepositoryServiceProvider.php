<?php

namespace App\Providers;

use App\Repositories\Contracts\DomainRepositoryInterface;
use App\Repositories\Eloquent\DomainRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Registrar ao iniciar o app a ligação entre interface e Ropository
         */
        $this->app->bind(
            DomainRepositoryInterface::class,
            DomainRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
