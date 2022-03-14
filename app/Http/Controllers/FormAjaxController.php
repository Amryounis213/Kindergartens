<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Auth;
use Illuminate\Http\Request;

class FormAjaxController extends Controller
{
    public function GetDivisionByLevel($id)
    {
        if(Auth::user()->kindergarten_id != null)
        {
            $divisions = Division::where('level_id', $id)->where('kindergarten_id' , Auth::user()->kindergarten_id)->get();

        }
        else{
            $divisions = Division::where('level_id', $id)->get();
        }
        return response()->json($divisions);
    }

}
