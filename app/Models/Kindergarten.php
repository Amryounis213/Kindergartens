<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kindergarten extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'status', 'address' , 'phone'
    ];

    public function Children()
    {
        return $this->hasMany(ClassPlacment::class , 'kindergarten_id' , 'id');
    }
}
