<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'max_children' , 'status' , 'level_id' , 'kindergarten_id'];
    
    
    public function Level()
    {
        return $this->belongsTo(Level::class , 'level_id' ,'id');
    }

    public function Kindergarten()
    {
        return $this->belongsTo(Kindergarten::class , 'kindergarten_id' ,'id');
    }

    public function Children()
    {
        return $this->hasMany(ClassPlacment::class , 'division_id' , 'id');
    }
}
