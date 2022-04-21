<?php

namespace App\Http\Controllers;

use App\Models\Children;
use App\Models\ClassPlacment;
use App\Models\Discount;
use App\Models\Division;
use App\Models\Employee;
use App\Models\JobPlacement;
use App\Models\Subscriptions;
use Auth;
use Illuminate\Http\Request;

class FormAjaxController extends Controller
{
    public function GetDivisionByLevel($id , $kinder)
    {
        if(Auth::user()->kindergarten_id != null)
        {
            $divisions = Division::where('level_id', $id)->where('kindergarten_id' , Auth::user()->kindergarten_id)->get();

        }
        else{
            $divisions = Division::where('level_id', $id)->where('kindergarten_id' , $kinder)->get();
        }
        return response()->json($divisions);
    }

    public function GetDivisionByKindergarten($id)
    {
        if(Auth::user()->kindergarten_id != null)
        {
            $divisions = Division::where('kindergarten_id' , Auth::user()->kindergarten_id)->get();

        }
        else{
            $divisions = Division::where('kindergarten_id' , $id)->get();
        }
        return response()->json($divisions);
    }



    public function GetEmployeeData($id)
    {
        $emp = JobPlacement::with(['Period' , 'Division' , 'Level'])->where('employee_id' , $id)->first();
       
        return response()->json($emp);
    }


    public function GetChildrenData($id)
    {
        $emp = ClassPlacment::with(['Period' , 'Division' , 'Level' , 'Year' , 'Children.Installment'])->where('children_id' , $id)->latest()->first();
        return response()->json($emp);
    }


    public function GetSubscriptionData($id)
    {
        $emp = Subscriptions::with('YearSubscription')->where('id' , $id)->first();
        return response()->json($emp);
    }


    public function GetDiscountData($id)
    {
        $emp = Discount::find($id);
        return response()->json($emp);
    }
    

    public function GetFeeData($id)
    {
        $sub_amount = Children::find($id)->ChildrenSubscriptions()->sum('total');
        $payment_amount = Children::find($id)->PayFee()->whereNull('deleted_at')->sum('payment_amount');
        $installment = Children::find($id)->Installment()->sum('paid_amount');
        return response()->json([
            'sub_amount'=>$sub_amount ,
            'payment_amount'=>$payment_amount + $installment ,
        ]);

    }

    public function GetEmployeeByKindergarten($id)
    {
        $emp =Employee::whereHas('JobPlacement' ,function($query) use($id){
            $query->where('kindergarten_id' , $id);
        })->get();

        return response()->json($emp);
    }
}
