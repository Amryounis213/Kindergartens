<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\JobPlacement;
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
            $divisions = Division::where('level_id',1)->where('kindergarten_id' , $id)->get();
        }
        return response()->json($divisions);
    }



    public function GetEmployeeData($id)
    {
        $emp = JobPlacement::with(['Period' , 'Division' , 'Level'])->where('employee_id' , $id)->first();
       
        return response()->json($emp);
    }

}
