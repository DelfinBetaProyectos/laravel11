<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->app->instance(LoginResponse::class, new class implements LoginResponse {
      public function toResponse($request): RedirectResponse
      {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $home = config('fortify.home');

        if ($user->isAn('admin')) { $home = route('admin.dashboard'); }
        if ($user->isAn('manager')) { $home = route('manager.dashboard'); }
        
        return $request->wantsJson()
                        ? response()->json(['two_factor' => false])
                        : redirect()->intended($home);
      }
    });
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Fortify::createUsersUsing(CreateNewUser::class);
    Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
    Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
    Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

    RateLimiter::for('login', function (Request $request) {
      $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

      return Limit::perMinute(5)->by($throttleKey);
    });

    RateLimiter::for('two-factor', function (Request $request) {
      return Limit::perMinute(5)->by($request->session()->get('login.id'));
    });
  }
}
