<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayFees extends Model
{
    use HasFactory;
    protected $fillable = ['children_id' ,'year' ,'notices' ,'Receipt_number' , 'payment_amount' , 'payment_date'];
}
