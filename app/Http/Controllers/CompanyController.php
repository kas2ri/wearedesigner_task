<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

class CompanyController extends Controller
{
    //

    public function index()
    {
        $companies = Company::all();
        return view('companies.index',compact('companies'));
    }
    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
           
        ]);
$logoName=null;
$coverName=null;
        if(request()->logo)
        {
              $logoName = time() . '.' . request()->logo->extension();
              request()->logo->move(storage_path('app/public/logo'), $logoName);
        }
        if(request()->cover_image)
        {
              $coverName = time() . '.' . request()->cover_image->extension();
              request()->cover_image->move(storage_path('app/public/cover_image'), $coverName);
        }

        Company::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "log"=>$logoName,
            "cover_image"=>$coverName,
            "web"=>$request->web,
            "phone"=>$request->phone,
        ]);
        return redirect('companies');

    }
    public function edit($id)
    {
        $company= Company::where('id',$id)->first();
        return view('companies.edit',compact('company'));
    }
    public function update(Request $request,$id)
    {
      $logoName=$request->current_logo;
      $coverName=$request->cover_image;

        if(request()->logo)
        {
              $logoName = time() . '.' . request()->logo->extension();
              request()->logo->move(storage_path('app/public/logo'), $logoName);
        }
        if(request()->cover_image)
        {
              $coverName = time() . '.' . request()->cover_image->extension();
              request()->cover_image->move(storage_path('app/public/cover_image'), $coverName);
        }

        Company::where('id',$id)->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "log"=>$logoName,
            "cover_image"=>$coverName,
            "web"=>$request->web,
            "phone"=>$request->phone,
        ]);
        return redirect('companies');
    }
    public function removeLogo($id){
        
        Company::where('id',$id)->update(["log"=>null]);
        return back();
    }
    public function removeCover($id){
        Company::where('id',$id)->update([
            "cover_image"=>null,
        ]);

        return back();
    }

    public function delete($id)
    {
        Company::where('id',$id)->delete();
        return back();
    }
}
