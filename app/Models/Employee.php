<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['identity' ,'name' ,'mobile' ,'telephone' ,'gender' , 'address' ,'kindergartens' ,'major_id' ,'status' , 'bth_date' , 'add_date' , 'added_by' , 'notice' ];


    public function creator()
    {
        return $this->belongsTo(User::class , 'added_by' , 'id');
    }

    public function JobPlacement()
    {
        return $this->hasOne(JobPlacement::class , 'employee_id' , 'id');
    }

    public function attendance()
    {
        return $this->hasMany(EmployeesAttendance::class, 'employee_id');
    }
}
