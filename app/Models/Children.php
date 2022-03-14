<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,'age' , 'bth_date','father_id' , 'kindergarten_id','gender' , 'added_by' , 'status'
   ];
   public function Father()
   {
        return $this->belongsTo(Father::class , 'father_id' , 'id');
   }
   public function creator()
   {
        return $this->belongsTo(User::class , 'added_by' , 'id');
   }

   public function ClassPlacement()
   {
        return $this->hasOne(ClassPlacment::class , 'children_id' , 'id');
   }

   public function attendance()
   {
       return $this->hasMany(ChildrenAttendances::class, 'children_id');
   }
}
