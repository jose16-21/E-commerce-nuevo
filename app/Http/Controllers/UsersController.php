<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
}
  public function index() {
   //  app()['cache']->forget('spatie.permission.cache');
    $users = User::all();
    $roles = Role::all();
    //$id = Auth::user()->id;
    //$user= User::find($id);
    //$user->assignRole('Admin');

    return view('admin.users.index', compact('users','roles'));
  }

  public function activeDeactive(Request $request) {

    try {
      $user = User::findOrFail($request->user_id);
      $user->active = !$user->active;
      $user->save();
      return redirect()->back()->with('success', $user->name." status has been changed!");
    } catch(Exception $e)  {
      return redirect()->back()->withErrors(['You can\'t change your status!']);
    }
    
  }

  public function changeRole(Request $request) {
    
    try {
    
      $user = User::findOrFail($request->user_id);
      $user->syncRoles($request->role);
      return redirect()->back()->with('success', $user->name." role has been changed!");
    } catch(Exception $e)  {
      return redirect()->back()->withErrors(['You can\'t change your role!']);
    }
  }

}
