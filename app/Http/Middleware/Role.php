<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, string $role): Response
  {
    $vocals = array('a','e','i','o','u');

    if(in_array($role[0], $vocals)) {
      if(!$request->user()->isAn($role)) {
        throw new AuthorizationException();
      }
    } else {
      if(!$request->user()->isA($role)) {
        throw new AuthorizationException();
      }
    }

    return $next($request);
  }
}
