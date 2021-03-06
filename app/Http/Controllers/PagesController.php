<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Children;
use App\Models\ChildrenAttendances;
use App\Models\Clinic;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\EmployeesAttendance;
use App\Models\Kindergarten;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\Patient;
use App\Models\Xray;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{

    public function index()
    {
        // Get view file location from menu config
        $view = theme()->getOption('page', 'view');
        // Check if the page view file exist
        if (view()->exists('pages.' . $view)) {
            if ($view == 'index') {
                $employeeCount = Employee::count(); //sizeof(Patient::all());
                $studentsCount = Children::count(); //sizeof(Order::whereDate('created_at', Carbon::today())->get());
                $driversCount = Driver::whereHas('DriverPlacment')->count(); //sizeof(Clinic::all());
                $driverwithoutPlacment = Driver::whereDoesntHave('DriverPlacment')->count();
                
                $kinderCount = Kindergarten::count(); //sizeof(Checkup::all());
                $employeeAtt =  EmployeesAttendance::whereDate('attendence_date', date('y-m-d'))->where('attendence_status', 1)->count();
                $studentsAtt =  ChildrenAttendances::whereDate('attendence_date', date('y-m-d'))->where('attendence_status', 1)->count();
                $classplacementstudent = Children::whereHas('ClassPlacement')->count();

                /**
                 * Student Attendence
                 */
                $ChildrenMorning = ChildrenAttendances::whereDate('attendence_date', date('y-m-d'))->where('attendence_status', 1)->where('period_id' , 1)->count();
                $ChildrenNight = ChildrenAttendances::whereDate('attendence_date', date('y-m-d'))->where('attendence_status', 1)->where('period_id' , 2)->count();
                
                $AllChildrenMorning = Children::whereHas('ClassPlacement' , function($q){
                    $q->where('period_id' , 1) ;
                })->count();

                $AllChildrenNight = Children::whereHas('ClassPlacement' , function($q){
                    $q->where('period_id' , 2) ;
                })->count();


                /**
                 * Employee Attendence
                 * 
                 */

                $EmployeeMorning = EmployeesAttendance::whereDate('attendence_date', date('y-m-d'))->where('attendence_status', 1)->where('period_id' , 1)->count();
                $EmployeeNight = EmployeesAttendance::whereDate('attendence_date', date('y-m-d'))->where('attendence_status', 1)->where('period_id' , 2)->count();
                
                $AllEmployeeMorning = Employee::whereHas('JobPlacement' , function($q){
                    $q->where('period_id' , 1) ;
                })->count();

                $AllEmployeeNight = Employee::whereHas('JobPlacement' , function($q){
                    $q->where('period_id' , 2) ;
                })->count();
               

                /**
                 * Employee with jobplacment
                 */

                 $employeeJob =Employee::whereHas('JobPlacement')->count();
                 $employeewithoutJob = Employee::wheredoesnthave('JobPlacement')->count();   

                return view('pages.' . $view, compact(
                    'employeeCount',
                    'studentsCount',
                    'driversCount',
                    'kinderCount',
                    'employeeAtt',
                    'studentsAtt',
                    'classplacementstudent',
                    'ChildrenMorning',
                    'ChildrenNight',
                    'AllChildrenMorning' ,
                    'AllChildrenNight' ,
                    'EmployeeMorning',
                    'EmployeeNight',
                    'AllEmployeeMorning' ,
                    'AllEmployeeNight',
                    'employeeJob' ,
                    'employeewithoutJob',
                    'driverwithoutPlacment'
                ));
            } else {
                return view('pages.' . $view);
            }
        }

        // Get the default inner page
        return view('inner');
    }

    /**
     * Temporary function to replace icon duotone
     */
    public function replaceIcons()
    {
        $fileContent = file_get_contents(public_path('icon_replacement.txt'));
        $lines       = explode("\n", $fileContent);

        $patterns     = [];
        $replacements = [];
        foreach ($lines as $line) {
            $el             = explode(' - ', $line);
            $patterns[]     = trim($el[0]);
            $replacements[] = trim($el[1]);
        }

        $files    = File::allFiles(resource_path());
        $filtered = array_filter($files, function ($str) {
            return strpos($str, ".php") !== false;
        });

        foreach ($filtered as $file) {
            $bladeFileContent = file_get_contents($file->getPathname());

            $bladeFileContent = str_replace($patterns, $replacements, $bladeFileContent);

            file_put_contents($file->getPathname(), $bladeFileContent);
        }
    }
}
