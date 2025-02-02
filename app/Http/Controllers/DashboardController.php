<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
  /**
   * Show Dashboard.
   */
  public function dashboard(): View
  {
    return view('dashboard');
  }

  /**
   * Show Admin Dashboard.
   */
  public function admin(): View
  {
    return view('admin.dashboard');
  }
  
  /**
   * Show Manager Dashboard.
   */
  public function manager(): View
  {
    return view('manager.dashboard');
  }
}
