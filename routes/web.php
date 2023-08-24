<?php

use App\Models\Supplier;
use GuzzleHttp\Middleware;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleFuelController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\RoleAndPermissionController;
use App\Http\Controllers\VehicleMaintenanceController;
use App\Models\PurchaseOrder;

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
});


