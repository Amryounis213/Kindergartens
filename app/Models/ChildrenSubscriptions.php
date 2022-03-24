<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildrenSubscriptions extends Model
{
    use HasFactory;
    protected $fillable = ['children_id' , 'subscription_id' , 'total' , 'required_amount' , 'discount'];

    
    public function Subscription()
    {
        return $this->belongsTo(Subscriptions::class , 'subscription_id' ,'id');
    }

    public function Children()
    {
        return $this->belongsTo(Children::class , 'children_id' ,'id');
    }
}
