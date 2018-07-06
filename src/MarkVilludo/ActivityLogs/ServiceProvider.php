<?php 

namespace MarkVilludo\ImageUpload;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use MarkVilludo\ImageUpload\ImageUpload;

class ServiceProvider extends BaseServiceProvider {
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {      
        if (! class_exists('CreateActivityLogsTable')) {
            // Publish the migration
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../resources/migrations/create_activity_logs_table.php.stub' => $this->app->databasePath().'/migrations/'.$timestamp.'_create_activity_logs_table.php',
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

}
