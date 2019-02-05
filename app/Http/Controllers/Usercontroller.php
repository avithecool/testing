<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class Usercontroller extends Controller
{
    //
    public function index(Request $request)
    {
        $data = User::sortable()->paginate(10);
        return view('manager.users',compact('data',$data));
    }
    public function edit(User $user)
    {
         return view('manager.user',compact('user'));

    }
    public function destroy(User $user,Request $request)
    {
        $user->delete();
         $request->session()->flash('alert-success', 'User was successful deleted!');
        return redirect()->route('manager/users');
    }
    public function update(User $user,Request $request)
    {
        $id = $user->id;
          $rules = [
            'name' => 'bail|required|max:255|unique:users,name,' . $id,
            'email' => 'bail|required|email|max:255|unique:users,email,' . $id
        ];
        $request->validate($rules);
        $input = $request->all();
        $user->update($input);
        return back()->with('user-updated', __('The user has been successfully updated'));
     }
}
