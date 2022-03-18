<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
class ApiController extends Controller
{
    //
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $user->token=$user->createToken('livewire')->accessToken;

        return response()->json([
            "token"=>$user->token
        ]);
    }
    public function login(Request $request)
    {
        $input=$request->all();
       
        if(Auth::attempt($input)){
            $user= Auth::user();
            $user->token=$user->createToken('livewire')->accessToken;

            return response()->json([
                "token"=>$user->token
            ]);
        }else{
            return "failed";
        }
    }
    public function profile()
    {
        $user = Auth::user();
        return response()->json([
            "profile"=>$user
        ]);
     

    }

    public function employee()
    {
        # code...
        $employees = Employee::all();

        return response()->json([
            "employees"=>$employees
        ]);
    }

    public function company()
    {
        # code...

        $companies = Company::all();

        return response()->json([
            "companies"=>$companies
        ]);
    }
    public function logout(Request $request)
    {
        # code...
        $token = $request->user()->token();
        $token->revoke();
        return response()->json([
            "message"=>"Logout success"
        ]);
    }
}
