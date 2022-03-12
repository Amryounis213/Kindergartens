<?php
 
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\CheckupsController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\ClinicsController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\EmployeesAttendanceController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\FatherController;
use App\Http\Controllers\KindergardenController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderDiagnosticsController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\OrderCheckupsController;
use App\Http\Controllers\OrderMedicinesController;
use App\Http\Controllers\OrderXraysController;
use App\Http\Controllers\OrderCollectionsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\XraysController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function () {
    event(new App\Events\OrderEvent('Someone'));
    return "Event has been sent!";
});

Route::get('/', function () {
    return redirect('index');
});

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }
    }
});



//الروضات
Route::resource('kindergarden', KindergardenController::class);
Route::post('kindergarden/status', [KindergardenController::class, 'status'])->name('kindergarden.status');

//الموظفين
Route::resource('employees', EmployeesController::class);
Route::get('jobplacement/employees/{id?}', [EmployeesController::class , 'jobPlacementView'])->name('jobplacement.create');
Route::post('jobplacement/employees', [EmployeesController::class , 'jobPlacementStore'])->name('jobplacement.store');

//المستويات
Route::resource('levels' , LevelsController::class);

//الشعب الدراسية
Route::resource('divisions' , DivisionController::class);
Route::post('divisions/status', [DivisionController::class, 'status'])->name('divisions.status');

//اولياء الامور
Route::resource('fathers' , FatherController::class);
//الاطفال
Route::resource('childrens' , ChildrenController::class);
Route::get('classplacement/childrens/{id?}', [ChildrenController::class , 'classPlacementView'])->name('classplacement.create');
Route::post('classplacement/childrens', [ChildrenController::class , 'classPlacementStore'])->name('classplacement.store');
//الحضور والغياب
Route::resource('employees/attendance' , EmployeesAttendanceController::class);












// // Documentations pages
// Route::prefix('documentation')->group(function () {
//     Route::get('getting-started/references', [ReferencesController::class, 'index']);
//     Route::get('getting-started/changelog', [PagesController::class, 'index']);
// });

Route::middleware('auth')->group(function () {
    // Account
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('overview', [SettingsController::class, 'overview'])->name('overview.overview');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    // Log
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });

    // Order - pharmacy
    Route::get('order/pharmacy/{order}', [OrderMedicinesController::class, 'index'])->name('order.pharmacy');
    Route::get('order/medicine/list/{orderId}', [OrderMedicinesController::class, 'getList'])->name('order.medicine.list');
    Route::post('oorder/medicine/addrder/medicine/add', [OrderMedicinesController::class, 'postAdd'])->name('order.medicine.add');
    Route::delete('order/medicine/delete/{id}', [OrderMedicinesController::class, 'postDelete'])->name('order.medicine.delete');
    Route::post('order/medicine/status', [OrderMedicinesController::class, 'status'])->name('order.medicine.status');
    Route::post('order/medicine/total', [OrderMedicinesController::class, 'total'])->name('order.medicine.total');
    Route::get('order/medicine/print/{type}/{order}', [OrderMedicinesController::class, 'print'])->name('order.medicine.print');
    Route::post('order/medicine/netPrice/update', [OrderMedicinesController::class, 'updateNetPrice'])->name('order.medicine.netPrice.update');

    // Order - lab
    Route::get('order/lab/{order}', [OrderCheckupsController::class, 'index'])->name('order.lab');
    Route::get('order/checkup/List/{orderId}', [OrderCheckupsController::class, 'getList'])->name('order.checkup.list');
    Route::post('order/checkup/add', [OrderCheckupsController::class, 'postAdd'])->name('order.checkup.add');
    Route::delete('order/checkup/delete/{id}', [OrderCheckupsController::class, 'postDelete'])->name('order.checkup.delete');
    Route::post('order/checkup/status', [OrderCheckupsController::class, 'status'])->name('order.checkup.status');
    Route::post('order/checkup/total', [OrderCheckupsController::class, 'total'])->name('order.checkup.total');
    Route::get('order/checkup/print/{type}/{order}', [OrderCheckupsController::class, 'print'])->name('order.checkup.print');

    // Order - xrayRoom
    Route::get('order/xrayRoom/{order}', [OrderXraysController::class, 'index'])->name('order.xrayRoom');
    Route::get('order/xray/list/{orderId}', [OrderXraysController::class, 'getList'])->name('order.xray.list');
    Route::post('order/xray/add', [OrderXraysController::class, 'postAdd'])->name('order.xray.add');
    Route::delete('order/xray/delete/{id}', [OrderXraysController::class, 'postDelete'])->name('order.xray.delete');
    Route::post('order/xray/status', [OrderXraysController::class, 'status'])->name('order.xray.status');
    Route::post('order/xray/total', [OrderXraysController::class, 'total'])->name('order.xray.total');
    Route::get('order/xray/print/{type}/{order}', [OrderXraysController::class, 'print'])->name('order.xray.print');

    // Order - doctor
    Route::get('order/doctor/{order}', [OrderDiagnosticsController::class, 'index'])->name('order.doctor');
    Route::get('doctors/getByClinic', [OrderDiagnosticsController::class, 'getByClinic'])->name('doctors.getByClinic');
    Route::get('doctors/patient', [OrderDiagnosticsController::class, 'getPatientOrder'])->name('order.patient.doctor');
    Route::get('order/diagnosis/list/{orderId}', [OrderDiagnosticsController::class, 'getList'])->name('order.diagnosis.list');
    Route::post('order/diagnosis/add', [OrderDiagnosticsController::class, 'postAdd'])->name('order.diagnosis.add');
    Route::post('order/checkup/addCheckup', [OrderCheckupsController::class, 'postAddCheckup'])->name('order.checkup.addCheckup');
    Route::post('order/checkup/addXray', [OrderXraysController::class, 'postAddXray'])->name('order.checkup.addXray');
    Route::delete('order/diagnosis/delete/{id}', [OrderDiagnosticsController::class, 'postDelete'])->name('order.diagnosis.delete');
    Route::get('order/diagnosis/display/{order}', [OrderDiagnosticsController::class, 'display'])->name('order.diagnosis.display');

    // Order - collections
    Route::get('order/collections/{order}', [OrderCollectionsController::class, 'index'])->name('order.collections');
    Route::get('order/collections/list/{orderId}', [OrderCollectionsController::class, 'getList'])->name('order.collections.list');
    Route::post('order/collections/status', [OrderCollectionsController::class, 'status'])->name('order.collections.status');
    Route::get('order/collections/print/{order}', [OrderCollectionsController::class, 'print'])->name('order.collections.print');
    Route::post('order/collections/pay', [OrderCollectionsController::class, 'payOrder'])->name('order.collections.pay');

    // Order
    Route::get('order/print/{order}', [OrdersController::class, 'print'])->name('order.print');
    Route::post('order/cancel', [OrdersController::class, 'cancel'])->name('order.cancel');
    Route::post('order/status', [OrdersController::class, 'status'])->name('order.status');
    Route::post('order/status/update', [OrdersController::class, 'updateStatus'])->name('order.status.update');
    Route::post('order/field/update', [OrdersController::class, 'updateField'])->name('order.field.update');
    Route::get('order/searchPatients', [OrdersController::class, 'searchPatients'])->name('order.searchPatients');
    Route::get('order/searchMedicine', [OrdersController::class, 'searchMedicine'])->name('order.searchMedicine');
    Route::post('order/note/add', [OrdersController::class, 'addNote'])->name('order.note.add');
    Route::post('order/total', [OrdersController::class, 'orderTotal'])->name('order.total');
    Route::get('order/gov/data', [OrdersController::class, 'getGovData'])->name('order.gov.data');
    Route::resource('order', OrdersController::class);

    // Patient
    Route::post('patient/status', [PatientsController::class, 'status'])->name('patient.status');
    Route::resource('patient', PatientsController::class);
    
    // Medicine
    Route::post('medicine/status', [MedicinesController::class, 'status'])->name('medicine.status');
    Route::resource('medicine', MedicinesController::class);

    // Clinic
    Route::post('clinic/status', [ClinicsController::class, 'status'])->name('clinic.status');
    Route::resource('clinic', ClinicsController::class);

    // Checkup
    Route::post('checkup/status', [CheckupsController::class, 'status'])->name('checkup.status');
    Route::resource('checkup', CheckupsController::class);

    // Xray
    Route::post('xray/status', [XraysController::class, 'status'])->name('xray.status');
    Route::resource('xray', XraysController::class);

    // User
    Route::post('user/status', [UsersController::class, 'updateStatus'])->name('user.status');
    Route::put('user/password/{id}', [UsersController::class, 'changePassword'])->name('user.changePassword');
    Route::resource('user', UsersController::class);

    // Role
    Route::get('role/assign', [RolesController::class, 'assign'])->name('role.assign');
    Route::get('role/revoke', [RolesController::class, 'revoke'])->name('role.revoke');
    Route::get('role/permissions/{role}', [RolesController::class, 'permissions'])->name('role.permissions');
    Route::put('role/permissions/{role}', [RolesController::class, 'updatePermissions'])->name('role.permissions');
    Route::resource('role', RolesController::class);

    // Permission
    Route::get('permission/assign', [PermissionsController::class, 'assign'])->name('permission.assign');
    Route::get('permission/revoke', [PermissionsController::class, 'revoke'])->name('permission.revoke');
    Route::resource('permission', PermissionsController::class);
});


/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__ . '/auth.php';
