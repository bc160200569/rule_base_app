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
  
// Auth middleware using for check user are login or not if user are login then access these routes
Route::group(['middleware' => ['auth']], function() {

    // check_permission middleware are using for match user permission to access under this middleware
    Route::group(['middleware' => ['check_permission']], function(){
        
        // Role route start

            // Route::resource('roles', RoleController::class);
            
            Route::get('roles', [RoleController::class, 'index'])->name('roles.index'); 
            Route::post('roles', [RoleController::class, 'store'])->name('roles.store'); 
            Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');  
            Route::get('roles/{role}', [RoleController::class, 'show'])->name('roles.show');  
            Route::patch('roles/{role}', [RoleController::class, 'update'])->name('roles.update');  
            Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

        // Role route end
        
        // Products route start
        
            // Route::resource('products', ProductController::class); 

            Route::get('products', [ProductController::class, 'index'])->name('products.index'); 
            Route::post('products', [ProductController::class, 'store'])->name('products.store'); 
            Route::get('products/create', [ProductController::class, 'create'])->name('products.create');  
            Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');  
            Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');  
            Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
            // Route::resource('products', ProductController::class)->middleware('can:product-list');

        // Products route End
        
        // Permission Route Start

        // Route::resource('permission', PermissionController::class);
        
        Route::get('permission', [PermissionController::class, 'index'])->name('permission.index'); 
        Route::post('permission', [PermissionController::class, 'store'])->name('permission.store'); 
        Route::get('permission/create', [PermissionController::class, 'create'])->name('permission.create');  
        // Route::get('permission/{permission}', [PermissionController::class, 'show'])->name('permission.show');  
        Route::patch('permission/{permission}', [PermissionController::class, 'update'])->name('permission.update');  
        Route::get('permission/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
        // Route::delete('permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');
        
        // Permission Route End
        
        // User Route Start
    
            // Route::resource('users', UserController::class);
    
            Route::get('users', [UserController::class, 'index'])->name('users.index'); 
            Route::post('users', [UserController::class, 'store'])->name('users.store'); 
            Route::get('users/create', [UserController::class, 'create'])->name('users.create');  
            Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');  
            Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');  
            Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
        // User Route End
    });

    

    // Route::group(['middleware' => ['permission:product-list']], function () {   
    //     Route::get('products', [ProductController::class, 'index'])->name('products.index'); 
    //     Route::get('products_show/{product}', [ProductController::class, 'show'])->name('products.show'); 
    // });
    // Route::group(['middleware' => ['permission:product-create']], function () {   
    //     Route::get('products_create', [ProductController::class, 'create'])->name('products.create');  
    //     Route::post('products_store', [ProductController::class, 'store'])->name('products.store');  
    // });
    // Route::group(['middleware' => ['permission:product-edit']], function () {   
    //     Route::get('products_edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    //     Route::put('products_update/{product}', [ProductController::class, 'update'])->name('products.update');
    // });
    // Route::group(['middleware' => ['permission:product-delete']], function () {   
    //     Route::delete('products_destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    // });
    // Route::resource('products', ProductController::class)->middleware('can:product-list');

    // Navigation Route Start
        Route::resource('navigation', NavigationController::class);

        // Route::get('navigation', [NavigationController::class, 'index'])->name('navigation.index'); 
        // Route::post('navigation', [NavigationController::class, 'store'])->name('navigation.store'); 
        // Route::get('navigation/create', [NavigationController::class, 'create'])->name('navigation.create');  
        // // Route::get('navigation/{navigation}', [NavigationController::class, 'show'])->name('navigation.show');  
        // Route::patch('navigation/{navigation}', [NavigationController::class, 'update'])->name('navigation.update');  
        // Route::get('navigation/{navigation}/edit', [NavigationController::class, 'edit'])->name('navigation.edit');
        // Route::delete('navigation/{navigation}', [NavigationController::class, 'destroy'])->name('navigation.destroy');

    // Navigation Route End


    // Route::resource('sub_navigation', SubNavigationController::class);
    Route::get('sub_navigation/{id}', [SubNavigationCont::class, 'index'])->name('sub_navigation');
    Route::get('create_sub_navigation/{id}', [SubNavigationCont::class, 'create'])->name('create_sub_navigation');
    Route::post('store_sub_navigation/{id}', [SubNavigationCont::class, 'store'])->name('store_sub_navigation');
    Route::get('edit_sub_navigation/{id}', [SubNavigationCont::class, 'edit'])->name('edit_sub_navigation');
    Route::post('update_sub_navigation/{id}', [SubNavigationCont::class, 'update'])->name('update_sub_navigation');
    Route::post('get_sub_navigation', [NavigationController::class, 'get_sub_navigation']);

    Route::resource('formfield', FormFieldController::class);
    
    Route::post('get_form_field_type', [FormFieldController::class, 'get_form_field_type']);

    // Route::group(['middleware' => ['transaction_log']], function() {
        Route::resource('form', FormController::class);
    // });
    Route::get('showform/{id}',[FormController::class, 'showform'])->name('showform');
    Route::post('savetemplate',[FormController::class, 'savetemplate'])->name('savetemplate');
    Route::get('form_fields/{id}',[FormController::class, 'form_fields'])->name('form_fields');
    Route::get('edit_form_field/{id}',[FormController::class, 'edit_form_field'])->name('edit_form_field');
    Route::post('update_form_field',[FormController::class, 'update_form_field'])->name('update_form_field');
    Route::get('show_status/{id1}/{id2}/{id3}',[FormController::class, 'show_status'])->name('show_status');
    Route::post('update_field_position',[FormController::class, 'update_field_position'])->name('update_field_position');

    Route::resource('officer', OfficerController::class);
    Route::get('icp_chart/{id}',[OfficerController::class, 'show_icp_chart'])->name('icp_chart');

    Route::group(['middleware' => ['permission:products_index']], function () {            
    Route::get('products_index',[ProductController::class, 'products_index'])->name('products_index');
    });
    Route::get('edit_products/{id}',[ProductController::class, 'edit_products'])->name('edit_products');
    Route::get('update_products',[ProductController::class, 'update_products'])->name('update_products');
});
// Route::resource('products', ProductController::class)->middleware('can:product-list');
