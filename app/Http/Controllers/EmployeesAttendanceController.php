<?php

namespace App\Http\Controllers;

use App\DataTables\Attendance\AttendanceDataTable;
use App\Models\Employee;
use App\Models\EmployeesAttendance;
use Illuminate\Http\Request;

class EmployeesAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AttendanceDataTable $datatable ,Employee $employee)
    {
     
        return view('pages.Attendance.employees.index' , [
            'dataTable'=>$datatable ,
             'model'=>$employee,
             'employees'=>Employee::get(),
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {

            foreach ($request->attendences as $employeeid => $attendence) {

                if( $attendence == 1 ) {
                    $attendence_status = true;
                } else if( $attendence == 2 ){
                    $attendence_status = false;
                }

                EmployeesAttendance::create([
                    'employee_id'=> $employeeid,
                    'attendence_date'=> date('Y-m-d'),
                    'attendence_status'=> $attendence_status
                ]);

            }

            return redirect()->back()->with('success' , 'تم تسجيل الحضور بنجاح');

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
        //
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
        //
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
}
