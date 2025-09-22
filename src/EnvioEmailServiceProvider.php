<?php
namespace EnvioEmail;

use Illuminate\Support\ServiceProvider;

class EnvioEmailServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publica views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'envio-email');

        // Publica migrations
        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        // Permite publicar arquivos (opcional)
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/envio-email'),
        ], 'views');
    }
}
