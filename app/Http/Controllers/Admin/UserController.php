<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdatePasswordRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Silber\Bouncer\BouncerFacade as Bouncer;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request): View
  {
    if (isset($request->search)) { $search = $request->search; } else { $search = ''; }

    $users = User::ofSearch($search)->orderBy('firstname', 'ASC')->orderBy('lastname', 'ASC')->paginate()->withQueryString();

    return view('admin.users.index')->with('users', $users);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    $roles = Bouncer::role()->all();

    return view('admin.users.create')->with('roles', $roles);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest $request): RedirectResponse
  {
    $data = $request->validated();

    $user = User::create([
      'firstname' => $data['firstname'],
      'lastname' => $data['lastname'],
      'email' => $data['email'],
      'password' => Hash::make($data['password'])
    ]);

    $user->assign($data['roles']);

    return redirect()->route('admin.users.index')->with('status', 'User added successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user): View
  {
    $roles = Bouncer::role()->all();

    return view('admin.users.edit')->with('user', $user)->with('roles', $roles);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUserRequest $request, User $user): RedirectResponse
  {
    $data = $request->validated();

    $user->update([
      'firstname' => $data['firstname'],
      'lastname' => $data['lastname'],
      'email' => $data['email']
    ]);

    Bouncer::sync($user)->roles([]);
    $user->assign($data['roles']);

    return redirect()->route('admin.users.index')->with('status', 'User updated successfully');
  }

  /**
   * Show the form for change passwor.
   */
  public function password(User $user): View
  {
    return view('admin.users.password')->with('user', $user);
  }

  /**
   * Update password.
   */
  public function password_update(UpdatePasswordRequest $request, User $user): RedirectResponse
  {
    $data = $request->validated();

    $user->forceFill(['password' => Hash::make($data['password'])])->save();

    return redirect()->route('admin.users.index')->with('status', 'Password updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user): RedirectResponse
  {
    $user->delete();
    
    return redirect()->route('admin.users.index')->with('status', 'User deleted successfully');
  }
}
