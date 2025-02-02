<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $audits = Audit::with('user')->orderBy('created_at', 'desc')->paginate();

    return view('admin.audit')->with('audits', $audits);
  }
}
