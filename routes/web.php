<?php

use App\Models\Supplier;
use GuzzleHttp\Middleware;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\VehicleFuelController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\RoleAndPermissionController;
use App\Http\Controllers\VehicleMaintenanceController;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::controller(AuthController::class)->group( function(){
    Route::get('/login', 'login_view')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');
});


Route::middleware(Authenticate::class)->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(UserController::class)->group(function(){
        Route::get('/users', 'index')->name('users');
        Route::get('/user/create', 'create')->name('user.create');
        Route::post('/user/create', 'store');
        Route::get('/user/{user}/edit', 'edit')->name('user.edit');
        Route::post('/user/{user}/edit', 'update');
    });

    Route::controller(RoleAndPermissionController::class)->group(function(){
        Route::get('/roles', 'index')->name('roles');
        Route::get('/role/create', 'create')->name('role.create');
        Route::post('/role/create', 'store');
        Route::get('/role/{role}/edit', 'edit')->name('role.edit');
        Route::post('/role/{role}/edit', 'update');
    });

    Route::controller(RoleAndPermissionController::class)->group(function(){
        Route::get('/permissions', 'permission_index')->name('permissions');
        Route::get('/permission/create', 'permission_create')->name('permission.create');
        Route::post('/permission/create', 'permission_store');
        Route::get('/permission/{permission}/edit', 'permission_edit')->name('permission.edit');
        Route::post('/permission/{permission}/edit', 'permission_update');
    });

    Route::controller(RoleAndPermissionController::class)->group(function(){
        Route::get('assign/{role}/permissions', 'assign_permissions_view')->name('assign.permissions');
        Route::post('assign/{role}/permissions', 'assign_permissions');
    });

    Route::controller(OrganizationController::class)->group(function(){
        Route::get('/organizations', 'index')->name('organizations');
        Route::get('/organization/create', 'create')->name('organization.create');
        Route::post('/organization/create', 'store');
        Route::get('/organization/{organization}/edit', 'edit')->name('organization.edit');
        Route::post('/organization/{organization}/edit', 'update');
    });

    Route::controller(ProjectController::class)->group(function(){
        Route::get('/projects', 'index')->name('projects');
        Route::get('/project/create', 'create')->name('project.create');
        Route::post('/project/create', 'store');
        Route::get('/project/{project}/edit', 'edit')->name('project.edit');
        Route::post('/project/{project}/edit', 'update');
    });

    Route::controller(VehicleController::class)->group(function(){
        Route::get('/vehicles', 'index')->name('vehicles');
        Route::get('/vehicle/create', 'create')->name('vehicle.create');
        Route::post('/vehicle/create', 'store');
        Route::get('/vehicle/{vehicle}/edit', 'edit')->name('vehicle.edit');
        Route::post('/vehicle/{vehicle}/edit', 'update');
    });

    Route::controller(VehicleFuelController::class)->group(function(){
        Route::get('/vehicle/fuels', 'index')->name('vehicle.fuels');
        Route::get('/vehicle/fuel/create', 'create')->name('vehicle.fuel.create');
        Route::post('/vehicle/fuel/create', 'store');
        Route::get('/vehicle/fuel/{vehicle_fuel}/edit', 'edit')->name('vehicle.fuel.edit');
        Route::post('/vehicle/fuel/{vehicle_fuel}/edit', 'update');
    });

    Route::controller(VehicleMaintenanceController::class)->group(function(){
        Route::get('/vehicle/maintenance', 'index')->name('vehicle.maintenance');
        Route::get('/vehicle/maintenance/create', 'create')->name('vehicle.maintenance.create');
        Route::post('/vehicle/maintenance/create', 'store');
        Route::get('/vehicle/maintenance/{maintenance}/edit', 'edit')->name('vehicle.maintenance.edit');
        Route::post('/vehicle/maintenance/{maintenance}/edit', 'update');
    });

    Route::controller(SupplierController::class)->group(function(){
        Route::get('/suppliers', 'index')->name('suppliers');
        Route::get('/supplier/create', 'create')->name('supplier.create');
        Route::post('/supplier/create', 'store');
        Route::get('/supplier/{supplier}/edit', 'edit')->name('supplier.edit');
        Route::post('/supplier/{supplier}/edit', 'update');
    });

    Route::controller(PurchaseOrderController::class)->group(function(){
        Route::get('/purchases', 'index')->name('purchases');
        Route::get('/purchase/create', 'create')->name('purchase.create');
        Route::post('/purchase/create', 'store');
        Route::get('/purchase/{purchase}/edit', 'edit')->name('purchase.edit');
        Route::post('/purchase/{purchase}/edit', 'update');
    });

    Route::controller(DesignationController::class)->group(function(){
        Route::get('/designations', 'index')->name('designations');
        Route::get('/designation/create', 'create')->name('designation.create');
        Route::post('/designation/create', 'store');
        Route::get('/designation/{designation}/edit', 'edit')->name('designation.edit');
        Route::post('/designation/{designation}/edit', 'update');
    });

    Route::controller(EmployeeController::class)->group(function(){
        Route::get('/employees', 'index')->name('employees');
        Route::get('/employee/create', 'create')->name('employee.create');
        Route::post('/employee/create', 'store');
        Route::get('/employee/{employee}/show', 'show')->name('employee.show');
        Route::get('/employee/{employee}/edit', 'edit')->name('employee.edit');
        Route::post('/employee/{employee}/edit', 'update');
    });

    Route::controller(AttendanceController::class)->group(function(){
        Route::get('/attendances', 'index')->name('attendances');
        Route::post('/attendances/fetch', 'fetch_attendance')->name('attendance.fetch');
        Route::get('/attendance/create', 'create')->name('attendance.create');
        Route::post('/attendance/create', 'store');
        Route::get('/attendance/{attendance}/edit', 'edit')->name('attendance.edit');
        Route::post('/attendance/{attendance}/edit', 'update');
    });

    Route::controller(CustomerController::class)->group(function(){
        Route::get('/customers', 'index')->name('customers');
        Route::get('/customer/create', 'create')->name('customer.create');
        Route::post('/customer/create', 'store');
        Route::get('/customer/{customer}/edit', 'edit')->name('customer.edit');
        Route::post('/customer/{customer}/edit', 'update');
    });

    Route::controller(CoaController::class)->group(function(){
        Route::get('/chart-of-accounts', 'index')->name('coa.index');
        // Route::get('/get/account/lvl1', 'get_acc_lvl1')->name('get.acc.lvl1');
        // Route::post('/acc/create', 'store');
        // Route::get('/coa/{coa}/edit', 'edit')->name('coa.edit');
        // Route::post('/coa/{coa}/edit', 'update');
        Route::get('/get/account/level/1', 'get_account_level_1')->name('account.get_level_1');
        Route::get('/get/account/level/2', 'get_account_level_2')->name('account.get_level_2');
        Route::get('/get/account/level/3', 'get_account_level_3')->name('account.get_level_3');
        Route::post('/get/new/code', 'get_new_code')->name('account.new_code');

        Route::post('/chart-of-account/create', 'create_account')->name('account.create');

    });
});


