<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $fillable = ['number' ,'payment_date' , 'payment_amount' ,'children_id' , 'status' ,'notices' , 'year'];
}
