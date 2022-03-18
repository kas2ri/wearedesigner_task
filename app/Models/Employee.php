<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['first_name','last_name','company','profile_image','email','phone'];

    public  function CompanyData()
    {
        return $this->hasOne(Company::class, 'id', 'company');
    }
}
