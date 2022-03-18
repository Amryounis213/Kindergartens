<?php

namespace App\Http\Controllers;

use App\DataTables\Employees\EmployeesDataTable;
use App\Models\Division;
use App\Models\EducationalLevels;
use App\Models\Employee;
use App\Models\JobPlacement;
use App\Models\Kindergarten;
use App\Models\Level;
use App\Models\Major;
use App\Models\Period;
use Auth;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeesDataTable $dataTable)
    {
        
        return $dataTable->render('pages.employees.index.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::get();
        $kinder =Kindergarten::all();
        $education = EducationalLevels::get();
            return view('pages.employees.create.create' ,[
            'majors'=>$majors ,
            'kinder'=>$kinder ,
            'education'=>$education ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
     
       $request->merge([
           'bth_date'=> Carbon::createFromFormat('d/m/Y', $request->bth_date)->format('Y-m-d'),
           'added_by'=> Auth::guard('web')->id(),
           'add_date'=>Carbon::createFromFormat('d/m/Y', $request->add_date)->format('Y-m-d'),
       ]);
        Employee::create($request->all());

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $majors = Major::get();
        $kinder =Kindergarten::all();
        return view('pages.employees.edit.edit' ,[
            'majors'=>$majors ,
            'kinder'=>$kinder ,
            'employee'=>$employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //  dd($request->bth_date);
        $employee = Employee::find($id);
        
        if($request->bth_date)
        {
            $request->merge([
                'bth_date'=> $request->bth_date,
                'added_by'=> Auth::guard('web')->id(),
                'add_date'=> $request->add_date,
            ]);
        }
        
         $employee->update($request->all());
 
         return redirect()->route('employees.index')->with('success' , 'تم تعديل الموظف بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Employee::find($id);
        $info->delete();
        return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);

    }



    public function jobPlacementView($id=null)
    {
        $majors = Major::get();
        $kinder =Kindergarten::all();
        $employee = Employee::find($id);
        $levels= Level::get();
        $divisions=Division::get();
        return view('pages.employees.job_placement.create' ,[
            'majors'=>$majors ,
            'kinder'=>$kinder ,
            'periods'=>Period::select('id' , 'name')->get(),
            'employees'=> Employee::select('id' , 'name')->get(),
            'emp'=>$employee,
            'levels'=>$levels ,
            'divisions'=>$divisions ,
        ]);
    }
    public function jobPlacementStore(Request $request)
    {
      
        $exists = JobPlacement::where('employee_id' , $request->employee_id)->exists();


        if($exists)
        {
            $job_placment =JobPlacement::where('employee_id' , $request->employee_id)->first();
            $job_placment->update($request->all());
            return redirect()->route('employees.index')->with('success' , 'تم تعديل التسكين بنجاح');

        }

        else{


            JobPlacement::create($request->all());
            return redirect()->route('employees.index')->with('success' , 'تم التسكين بنجاح');
        }
       
    }

    //////////////////////////////////////////////
    public function status(Request $request)
    {
        $id = $request->get('id');
        $info = Employee::find($id);
        return updateModelStatus($info);
    }
}
