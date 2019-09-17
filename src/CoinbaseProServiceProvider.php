<?php
namespace Gbanina\CoinbasePro;

use Illuminate\Support\ServiceProvider;

class CoinbaseProServiceProvider extends ServiceProvider {

        public function boot()
        {
            $this->publishes([
                __DIR__.'/config/coinbasepro.php' => config_path('coinbasepro.php'),
            ]);
        }
        public function register()
        {
        }
}
