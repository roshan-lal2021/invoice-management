<?php

namespace GoApptiv\InvoiceManagement\Providers;

use Goapptiv\InvoiceManagement\Repositories\InvoiceManagement\InvoiceManagementLogRepositoryInterface;
use GoApptiv\InvoiceManagement\Services\InvoiceManagement\InvoiceManagementService;
use Illuminate\Support\ServiceProvider;

class InvoiceManagementServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publishes the migration files
        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations'),
        ], 'invoice-management-migrations');
    }

    public function register()
    {
        $this->app->singleton('goapptiv-invoice-management', function ($app) {
            return new InvoiceManagementService(
                $app->make(
                    InvoiceManagementLogRepositoryInterface::class
                )
            );
        });
    }
}
