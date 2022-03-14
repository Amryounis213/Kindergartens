<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'mobile',
        'bus_no',
        'kindergarten_id' ,
        'status',
       
    ];

    public function Kindergarten()
    {
        return $this->belongsTo(Kindergarten::class , 'kindergarten_id' ,'id');
    }
}
