<?php 
namespace Alamin\UniqueSlugGenerator;

use Illuminate\Support\ServiceProvider;
class UniqueSlugGenerateProvider extends ServiceProvider
{

    public function register(){
        $this->app->singleton('unique-slug',function($app){
            return new \Alamin\UniqueSlugGenerator\UniqueSlug();
        });
    }

    public function boot()
    {
        
    }
    
}
