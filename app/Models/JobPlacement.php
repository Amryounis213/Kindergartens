<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPlacement extends Model
{
    use HasFactory;
    protected $fillable = [
         'period_id' , 'job_id' , 'employee_id' , 'levels_id' , 'is_mother','divisions_id', 'year'
    ];

    public function Employee()
    {
        return $this->belongsTo(Employee::class , 'employee_id' , 'id');
    }

    public function Period()
    {
        return $this->belongsTo(Period::class , 'period_id' , 'id');
    }

    public function Job()
    {
        return $this->belongsTo(Job::class , 'job_id' , 'id');
    }

    public function Division()
    {
        return $this->belongsTo(Division::class , 'division_id' , 'id');
    }

    public function Level()
    {
        return $this->belongsTo(Level::class , 'level_id' , 'id');
    }


}
