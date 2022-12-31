<?php

namespace GoApptiv\InvoiceManagement\Providers;

use Goapptiv\InvoiceManagement\Repositories\InvoiceManagement\InvoiceManagementLogRepository;
use Goapptiv\InvoiceManagement\Repositories\InvoiceManagement\InvoiceManagementLogRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $toBind = [
            InvoiceManagementLogRepositoryInterface::class => InvoiceManagementLogRepository::class
        ];

        foreach ($toBind as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
