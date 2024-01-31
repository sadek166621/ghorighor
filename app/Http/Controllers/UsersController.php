<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function users(){
        $roles = Role::all();
        return view('admin.users.add-users',compact('roles'));
    }
    public function addusers(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create New User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been created !!');
        return redirect('/manage-users');
    }
    public function manageusers(){
        $users = User::all()->skip(1);
        return view('admin.users.manage-users', compact('users'));
    }
    public function editusers($id){
        $user = User::find($id);
        $roles  = Role::all();
        return view('admin.users.edit-users', compact('user', 'roles'));
    }
    public function updateusers(Request $request){
        $user = User::find($request->users_id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|',
            'password' => 'nullable|min:6|confirmed',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been updated !!');
        return redirect('/manage-users');
    }
    public function deleteusers($id){
        $user = User::find($id);
        $user-> delete();
        session()->flash('success', 'User has been deleted !!');
        return back();
    }
}
