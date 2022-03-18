<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index($id)
    {
        $user = User::where('id',$id)->first();
        return view("profile",compact('user'));
    }
    public function update(Request $request,$id){
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        User::where('id',$id)->update(['name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);

        return back();
        
    }
}
