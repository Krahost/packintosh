<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;

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
    public function boot()
    {
        Blade::directive('statusColor', function ($status) {
            return "<?php echo e($status === 'Active' ? 'text-success' : 'text-danger'); ?>";
        });
        Paginator::useBootstrap();
    }
}
