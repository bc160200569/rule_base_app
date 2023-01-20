<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\FormFieldController;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\SubNavigationCont;
// use App\Http\Controllers\SubNavigationController;
use Illuminate\Support\Facades\Auth;
  
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
    return view('welcome');
});
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    // Route::resource('products', ProductController::class)->middleware('can:product-list');
    Route::resource('navigation', NavigationController::class);
    Route::resource('permission', PermissionController::class);
    // Route::resource('sub_navigation', SubNavigationController::class);
    Route::get('sub_navigation/{id}', [SubNavigationCont::class, 'index'])->name('sub_navigation');
    Route::get('create_sub_navigation/{id}', [SubNavigationCont::class, 'create'])->name('create_sub_navigation');
    Route::post('store_sub_navigation/{id}', [SubNavigationCont::class, 'store'])->name('store_sub_navigation');
    Route::get('edit_sub_navigation/{id}', [SubNavigationCont::class, 'edit'])->name('edit_sub_navigation');
    Route::post('update_sub_navigation/{id}', [SubNavigationCont::class, 'update'])->name('update_sub_navigation');
    Route::post('get_sub_navigation', [NavigationController::class, 'get_sub_navigation']);

    Route::resource('formfield', FormFieldController::class);
    
    Route::post('get_form_field_type', [FormFieldController::class, 'get_form_field_type']);

    Route::resource('form', FormController::class);
    Route::get('showform/{id}',[FormController::class, 'showform'])->name('showform');
    Route::post('savetemplate',[FormController::class, 'savetemplate'])->name('savetemplate');
    Route::get('form_fields/{id}',[FormController::class, 'form_fields'])->name('form_fields');
    Route::get('edit_form_field/{id}',[FormController::class, 'edit_form_field'])->name('edit_form_field');
    Route::post('update_form_field',[FormController::class, 'update_form_field'])->name('update_form_field');
    Route::get('show_status/{id1}/{id2}/{id3}',[FormController::class, 'show_status'])->name('show_status');
    Route::post('update_field_position',[FormController::class, 'update_field_position'])->name('update_field_position');

    Route::resource('officer', OfficerController::class);
    Route::get('icp_chart/{id}',[OfficerController::class, 'show_icp_chart'])->name('icp_chart');
});
// Route::resource('products', ProductController::class)->middleware('can:product-list');
