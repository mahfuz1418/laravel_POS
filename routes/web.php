<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pos/dashboard', function () {
    return view('project.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function(){
    // EMPLOYEE ROUTE START 
    Route::get('/add_empoloyee', [EmployeeController::class, 'index'])->name('add.employee');
    Route::post('/store_empoloyee', [EmployeeController::class, 'store'])->name('store.employee');
    Route::get('/all_employee', [EmployeeController::class, 'allEmployee'])->name('all.employee');
    Route::get('/delete_employee/{id}', [EmployeeController::class, 'deleteEmployee'])->name('delete.employee');
    Route::get('/view_employee/{id}', [EmployeeController::class, 'viewEmployee'])->name('view.employee');
    Route::get('/edit_employee/{id}', [EmployeeController::class, 'editEmployee'])->name('edit.employee');
    Route::post('/update_employee/{id}', [EmployeeController::class, 'updateEmployee'])->name('update.employee');

    // CUSTOMER ROUTE START 
    Route::get('/add_customer', [CustomerController::class, 'index'])->name('add.customer');
    Route::post('/store_customer', [CustomerController::class, 'store'])->name('store.customer');
    Route::get('/all_customer', [CustomerController::class, 'allCustomer'])->name('all.customer');
    Route::get('/delete_customer/{id}', [CustomerController::class, 'deleteCustomer'])->name('delete.customer');
    Route::get('/view_customer/{id}', [CustomerController::class, 'viewCustomer'])->name('view.customer');
    Route::get('/edit_customer/{id}', [CustomerController::class, 'editCustomer'])->name('edit.customer');
    Route::post('/update_customer/{id}', [CustomerController::class, 'updateCustomer'])->name('update.customer');

    // CUSTOMER ROUTE START 
    Route::get('/add_supplier', [SupplierController::class, 'index'])->name('add.supplier');
    Route::post('/store_supplier', [SupplierController::class, 'store'])->name('store.supplier');
    Route::get('/all_supplier', [SupplierController::class, 'allSupplier'])->name('all.supplier');
    Route::get('/delete_supplier/{id}', [SupplierController::class, 'deleteSupplier'])->name('delete.supplier');
    Route::get('/view_supplier/{id}', [SupplierController::class, 'viewSupplier'])->name('view.supplier');
    Route::get('/edit_supplier/{id}', [SupplierController::class, 'editSupplier'])->name('edit.supplier');
    Route::post('/update_supplier/{id}', [SupplierController::class, 'updateSupplier'])->name('update.supplier');
});







require __DIR__.'/auth.php';
