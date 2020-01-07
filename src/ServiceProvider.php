<?php
namespace Dvb\Eboekhouden;

use Dvb\Accounting\AccountingProvider;
use Illuminate\Support\ServiceProvider as SP;

class ServiceProvider extends SP {
    public function boot() {
        $this->publishes([
            __DIR__ . '/../config/eboekhouden.php' => config_path('eboekhouden.php')
        ]);
    }

    public function register() {
        $this->mergeConfigFrom(__DIR__ . '/../config/eboekhouden.php', 'eboekhouden');

        $this->app->singleton(AccountingProvider::class, function($app) {
            return new EboekhoudenProvider();
        });
    }
}
