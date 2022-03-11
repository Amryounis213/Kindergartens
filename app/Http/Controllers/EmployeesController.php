<?php

namespace App\Http\Controllers;

use App\DataTables\Employees\EmployeesDataTable;
use App\Models\Employee;
use App\Models\JobPlacement;
use App\Models\Kindergarten;
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
        return view('pages.employees.create.create' ,[
            'majors'=>$majors ,
            'kinder'=>$kinder ,
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
     
      //  $tt = DateTime::createFromFormat('d/m/Y', $request->bth_date);
       // $dob = $request->get('bth_date');
    
       $request->merge([
           'bth_date'=> Carbon::parse($request->get('bth_date'))->format('Y-m-d'),
           'added_by'=> Auth::guard('web')->id(),
           'add_date'=>Carbon::now()->format('Y-m-d'),
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
        $employee = Employee::find($id);

        if($request->bth_date)
        {
            $request->merge([
                'bth_date'=> Carbon::parse($request->get('bth_date'))->format('Y-m-d'),
                'added_by'=> Auth::guard('web')->id(),
                'add_date'=>Carbon::now()->format('Y-m-d'),
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
        //
    }



    public function jobPlacementView($id=null)
    {
        $majors = Major::get();
        $kinder =Kindergarten::all();
        $employee = Employee::find($id);
        return view('pages.employees.job_placement.create' ,[
            'majors'=>$majors ,
            'kinder'=>$kinder ,
            'periods'=>Period::select('id' , 'name')->get(),
            'employees'=> Employee::select('id' , 'name')->get(),
            'emp'=>$employee,
        ]);
    }
    public function jobPlacementStore(Request $request)
    {

       JobPlacement::create($request->all());
       return redirect()->route('employees.index')->with('success' , 'تم التسكين بنجاح');
    }
}
