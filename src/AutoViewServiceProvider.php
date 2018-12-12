<?php
namespace Omatech\AutoView;

use Illuminate\Support\ServiceProvider;
use Omatech\AutoView\App\Providers\ConfigurationServiceProvider;
use Omatech\AutoView\App\Providers\PublishServiceProvider;

class AutoViewServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application service providers.
     *
     * @return void
     */
    public function register()
    {
        $this->providers();

    }

    private function providers()
    {
        $this->app->register(ConfigurationServiceProvider::class);
        $this->app->register(PublishServiceProvider::class);
    }
}