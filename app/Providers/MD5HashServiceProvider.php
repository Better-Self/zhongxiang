<?php

namespace App\Providers; 
 
use Illuminate\Support\ServiceProvider; 
use App\MD5\MD5Hasher; 
class MD5HashServiceProvider extends ServiceProvider 
{ 
    //后添加MD5验证 
    /** 
     * Bootstrap the application services. 
     * 
     * @return void 
     */ 
    public function boot() 
    { 
        // 
    } 
 
    /** 
     * Register the application services. 
     * 
     * @return void 
     */ 
    public function register() 
    { 
        $this->app->singleton('hash', function () { 
            return new MD5Hasher; 
        }); 
 
    } 
} 