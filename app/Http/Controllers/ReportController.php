<?php

namespace App\Http\Controllers;

use App\DataTables\Employees\EmployeesDataTable;
use App\DataTables\Reports\ChildrenPayFeesDataTable;
use App\DataTables\Reports\ChildrensDataTable;
use App\DataTables\Reports\InComesDatatable;
use App\DataTables\Reports\OutComesDatatable;
use App\Models\Children;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Level;
use App\Models\Period;
use App\Models\Year;
use Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    public function ChildrenIndex(ChildrensDataTable $datatable)
    {
        $childrens = Children::whereHas('ClassPlacement')->get();
        $years = Year::get();
        $employees = Employee::select('id', 'name')->get();
        $levels = Level::get();
        $divisions = Division::get();
        $periods = Period::get();
       return $datatable->render('pages.reports.index' , compact('childrens' , 'years' , 'employees' ,'levels' ,'divisions'  , 'periods'));
    }

    


    public function EmployeeIndex(EmployeesDataTable $datatable)
    {
        $childrens = Children::whereHas('ClassPlacement')->get();
        $years = Year::get();
        $employees = Employee::select('id', 'name')->get();
        $levels = Level::get();
        $divisions = Division::get();
        $periods = Period::get();
       return $datatable->render('pages.reports.index' , compact('childrens' , 'years' , 'employees' ,'levels' ,'divisions'  , 'periods'));
    }

    public function FeeTotal(ChildrenPayFeesDataTable $datatable)
    {
        $years = Year::where('status' , 1)->get();
        /**
         * =========================================
         * For Children Doesnt Have Any Installments 
         * =========================================
         */
        $childrens = Children::whereDoesntHave('Installment' , function($query){
            $query->where('status' , 'unpaid');
        })->get();
        /**
         * =========================================
         * For Children Doesnt Have Any Installments
         * And Children In Kindergarten same Manger 
         * =========================================
         */
        if(Auth::user()->kindergarten_id != null)
        {   
            $childrens = Children::whereHas('ClassPlacement' , function($query){
                $query->where('kindergarten_id' , Auth::user()->kindergarten_id);
            })->whereDoesntHave('Installment' , function($query){
                $query->where('status' , 'unpaid');
            })->get();
        }
        return $datatable->render('pages.reports.fee.index' , compact('childrens' , 'years'));
    }


    public function InComes(InComesDatatable $datatable)
    {
        $years = Year::where('status' , 1)->get();
        return $datatable->render('pages.reports.in.index' , compact('years'));
    }


    public function OutComes(OutComesDatatable $datatable)
    {
        $years = Year::where('status' , 1)->get();
        return $datatable->render('pages.reports.out.index' , compact('years'));
    }



}
