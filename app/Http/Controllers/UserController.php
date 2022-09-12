<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->filter(request(['searchUser']))->paginate(10)->withQueryString();
        return view('admin.index',compact('users'));
    }
    public function update(Request $request, User $user){
        
        $attributes = $request->validate([
            'role_id' => ['required', Rule::exists('roles','id')]
        ]);
        
            $user->update($attributes);
       

        return redirect()->route('admin');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin');
   }
}
