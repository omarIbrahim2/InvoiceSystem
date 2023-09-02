<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Src\Repositories\InvoiceRepo;
use App\Src\Repositories\ProductRepo;
use App\Src\Repositories\CustomerRepo;
use Illuminate\Support\ServiceProvider;
use App\Src\Utilities\InvoiceCalculations;
use App\Src\Interfaces\InvoiceRepoInterface;
use App\Src\Interfaces\ProductRepoInterface;
use App\Src\Interfaces\CustomerRepoInterface;
use App\Src\Interfaces\InvoiceCalculateTotalInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(ProductRepoInterface::class , ProductRepo::class);
        app()->bind(CustomerRepoInterface::class , CustomerRepo::class);
        app()->bind(InvoiceRepoInterface::class , InvoiceRepo::class);
        app()->bind(InvoiceCalculateTotalInterface::class , InvoiceCalculations::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
