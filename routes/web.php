<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'ApiController@index')->name('index');
Route::post('login','ApiController@login')->name('login');
Route::get('logout', 'ApiController@logout')->name('logout')->middleware('CheckUserSession');
Route::get('dashboard','ApiController@dashboard')->name('dashboard')->middleware('CheckUserSession');
Route::any('vehicle-list','ApiController@vehicleList')->name('vehicle-list')->middleware('CheckUserSession');
Route::get('add-vehicle','ApiController@addVehicle')->name('add-vehicle')->middleware('CheckUserSession');
Route::post('post-vehicle','ApiController@postVehicle')->name('post-vehicle')->middleware('CheckUserSession');
Route::get('delete-vehicle/{id}','ApiController@deleteVehicle')->name('delete-vehicle')->middleware('CheckUserSession');
Route::get('edit-vehicle/{id}','ApiController@editVehicle')->name('edit-vehicle')->middleware('CheckUserSession');
Route::get('view-vehicle/{vehicle_rc}','ApiController@viewVehicle')->name('view-vehicle')->middleware('CheckUserSession');

Route::any('driver-list','DriverController@driverList')->name('driver-list')->middleware('CheckUserSession');
Route::get('add-driver','DriverController@addDriver')->name('add-driver')->middleware('CheckUserSession');
Route::get('edit-driver/{did}','DriverController@editDriver')->name('edit-driver')->middleware('CheckUserSession');
Route::get('view-driver/{mobile_no}','DriverController@viewDriver')->name('view-driver')->middleware('CheckUserSession');
Route::get('delete-driver/{did}','DriverController@deleteDriver')->name('delete-driver')->middleware('CheckUserSession');

Route::any('warehouse-list','WarehouseController@warehouseList')->name('warehouse-list')->middleware('CheckUserSession');
Route::get('add-warehouse','WarehouseController@addWarehouse')->name('add-warehouse')->middleware('CheckUserSession');
Route::get('edit-warehouse/{wid}','WarehouseController@editWarehouse')->name('edit-warehouse')->middleware('CheckUserSession');
Route::get('delete-warehouse/{wid}','WarehouseController@deleteWarehouse')->name('delete-warehouse')->middleware('CheckUserSession');

Route::any('dustbin-list','DustbinController@dustbinList')->name('dustbin-list')->middleware('CheckUserSession');
Route::get('add-dustbin','DustbinController@addDustbin')->name('add-dustbin')->middleware('CheckUserSession');
Route::get('edit-dustbin/{did}','DustbinController@editDustbin')->name('edit-dustbin')->middleware('CheckUserSession');
Route::get('delete-dustbin/{did}','DustbinController@deleteDustbin')->name('delete-dustbin')->middleware('CheckUserSession');

Route::any('driver-vehicle-mapping','MappingController@mappingVehicledriver')->name('driver-vehicle-mapping')->middleware('CheckUserSession');
Route::any('driver-not-assign','MappingController@driver_not_assign')->name('driver-not-assign')->middleware('CheckUserSession');
Route::any('warehouse-vehicle-mapping','MappingController@warehouseVehicleMapping')->name('warehouse-vehicle-mapping')->middleware('CheckUserSession');
Route::any('vehicle-not-assign','MappingController@vehicle_not_assign')->name('vehicle-not-assign')->middleware('CheckUserSession');
Route::any('pickup','PickupController@pickup')->name('pickup')->middleware('CheckUserSession');
Route::any('pickup-create','PickupController@pickup_create')->name('pickup-create')->middleware('CheckUserSession');
Route::any('view-details/{groupName}','PickupController@pickup_details')->name('view-details')->middleware('CheckUserSession');
Route::any('getDataDustbin','PickupController@getDataDustbin')->name('getDataDustbin')->middleware('CheckUserSession');
Route::any('pickup-history','PickupController@pickup_history')->name('pickup-history')->middleware('CheckUserSession');
Route::any('dustbin-history','PickupController@dustbin_history')->name('dustbin-history')->middleware('CheckUserSession');
Route::any('available-vehicle','PickupController@available_vehicle')->name('available-vehicle')->middleware('CheckUserSession');
Route::any('notavailable-vehicle','PickupController@notavailable_vehicle')->name('notavailable-vehicle')->middleware('CheckUserSession');
Route::any('avilable-history','PickupController@avilable_history')->name('avilable-history')->middleware('CheckUserSession');
Route::any('vehicle-assign','PickupController@vehicle_assign')->name('vehicle-assign')->middleware('CheckUserSession');


