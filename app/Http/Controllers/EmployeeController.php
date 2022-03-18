<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //

    public function index()
    {
        $employees = Employee::with('CompanyData')->get();
        return view("employees.index",compact('employees'));
    }
    public function create()
    {
        $companies = Company::all();
        return view("employees.create",compact("companies"));
    }
    public function store(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['required'],
        ]);
        $profileImage=null;
        if(request()->profile_image)
        {
              $profileImage = time() . '.' . request()->profile_image->extension();
              request()->profile_image->move(storage_path('app/public/profile_image'), $profileImage);
        }

        Employee::create([
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "company"=>$request->company,
            "profile_image"=>$profileImage,
            "email"=>$request->email,
            "phone"=>$request->phone,
        ]);
        return redirect('employee');
    }
    public function edit($id)
    {
        # code...
        $employee= Employee::where('id',$id)->first();
        $companies = Company::all();
        return view('employees.edit',compact('employee','companies'));
    }

    public function removeImage($id)
    {
        # code...

        Employee::where('id',$id)->update([
         
            "profile_image"=>null,
     
        ]);

        return back();
    }

    public function update(Request $request,$id)
    {
        # code...
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['required'],
        ]);
        $profileImage=$request->current_profile_image;
        if(request()->profile_image)
        {
              $profileImage = time() . '.' . request()->profile_image->extension();
              request()->profile_image->move(storage_path('app/public/profile_image'), $profileImage);
        }

        Employee::where('id',$id)->update([
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "company"=>$request->company,
            "profile_image"=>$profileImage,
            "email"=>$request->email,
            "phone"=>$request->phone,
        ]);

        return back();
    }
    public function delete($id)
    {
        Employee::where('id',$id)->delete();
        return back();
    }
}
