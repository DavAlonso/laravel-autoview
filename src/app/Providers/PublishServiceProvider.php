<?php

namespace Omatech\AutoView\App\Providers;

use Illuminate\Support\ServiceProvider;

class PublishServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->publish();
    }

    /**
     * Publish configurations.
     *
     * @return void
     */
    private function publish()
    {
        $this->publishes([
            __DIR__.'/../../config/autoview.php' => config_path('autoview.php'),
        ]);
    }
}