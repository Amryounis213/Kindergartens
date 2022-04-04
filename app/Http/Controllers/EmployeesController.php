<?php

namespace App\Http\Controllers;

use App\DataTables\Employees\EmployeesDataTable;
use App\DataTables\Employees\TrashedDataTable;
use App\Models\Division;
use App\Models\EducationalLevels;
use App\Models\Employee;
use App\Models\Job;
use App\Models\JobPlacement;
use App\Models\Kindergarten;
use App\Models\Level;
use App\Models\Major;
use App\Models\Period;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function index(EmployeesDataTable $dataTable)
    {

        return $dataTable->render('pages.employees.index.index');

    }

    public function create()
    {
        $majors = Major::get();
        $kinder = Kindergarten::all();
        $education = EducationalLevels::get();
        return view('pages.employees.create.create', [
            'majors' => $majors,
            'kinder' => $kinder,
            'education' => $education,
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->merge([
            'bth_date' => Carbon::createFromFormat('d/m/Y', $request->bth_date)->format('Y-m-d'),
            'added_by' => Auth::guard('web')->id(),
            'add_date' => Carbon::createFromFormat('d/m/Y', $request->add_date)->format('Y-m-d'),
        ]);
        Employee::create($request->all());

        return redirect()->route('employees.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $majors = Major::get();
        $education = EducationalLevels::get();

        $kinder = Kindergarten::all();
        return view('pages.employees.edit.edit', [
            'majors' => $majors,
            'kinder' => $kinder,
            'employee' => $employee,
            'education' => $education,

        ]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $employee = Employee::find($id);

        if ($request->bth_date) {
            $request->merge([
                'bth_date' => $request->bth_date,
                'added_by' => Auth::guard('web')->id(),
                'add_date' => $request->add_date,
            ]);
        }

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'تم تعديل الموظف بنجاح');
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $info = Employee::find($id);
        $info->delete();
        return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);

    }

    public function jobPlacementView($id = null)
    {
        $jobs = Job::get();
        $kinder = Kindergarten::all();
        $employee = Employee::find($id);
        $levels = Level::get();
        $divisions = Division::get();
        return view('pages.employees.job_placement.create', [
            'jobs' => $jobs,
            'kinder' => $kinder,
            'periods' => Period::select('id', 'name')->get(),
            'employees' => Employee::select('id', 'name')->get(),
            'emp' => $employee,
            'levels' => $levels,
            'divisions' => $divisions,
        ]);
    }

    public function jobPlacementStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        $exists = JobPlacement::where('employee_id', $request->employee_id)->exists();
        if ($exists) {
            $job_placement = JobPlacement::where('employee_id', $request->employee_id)->first();
            $job_placement->update($request->all());
            return redirect()->route('employees.index')->with('success', 'تم تعديل التسكين بنجاح');
        } else {
            JobPlacement::create($request->all());
            return redirect()->route('employees.index')->with('success', 'تم التسكين بنجاح');
        }
    }

    //////////////////////////////////////////////
    public function status(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = Employee::find($id);
        return updateModelStatus($info);
    }

    public function GetTrashed(TrashedDataTable $dataTable)
    {
       // $emp=Employee::onlyTrashed()->get();
        return $dataTable->render('pages.employees.index.index');
    }


    public function RestoreTrashed($id)
    {
        $children = Employee::withTrashed()->where('id' , $id)->first();
        $children->deleted_at = null ;
        $children->save();
        return redirect()->back()->with('success' , 'تم استرجاع الطالب بنجاح');
    }
}
