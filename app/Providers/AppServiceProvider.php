<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Silber\Bouncer\BouncerFacade as Bouncer;

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
  public function boot(): void
  {
    Bouncer::tables([
      'abilities' => 'bouncer_abilities',
      'permissions' => 'bouncer_permissions',
      'roles' => 'bouncer_roles',
      'assigned_roles' => 'bouncer_assigned_roles',
    ]);
    
    Model::preventLazyLoading(! app()->isProduction());
  }
}
