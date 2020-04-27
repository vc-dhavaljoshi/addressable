<?php

namespace Viitortest\Addressable;

use Illuminate\Support\ServiceProvider;

class AddressesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //    
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublish();
    }
    /**
     * @return void
     */
    protected function registerPublish(): void
    {
        if (!class_exists('CreateAddressTable')) {
            $this->publishes([
                __DIR__ . '/../config/addressable.php' => config_path('addressable.php')
            ], 'address-config');
            $this->publishes([
                __DIR__ . '/../database/migrations/create_address_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_address_table.php'),
            ], 'migrations');
        }

    }
}
