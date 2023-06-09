<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SettingController;
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
    Route::get('/add-empoloyee', [EmployeeController::class, 'index'])->name('add.employee');
    Route::post('/store-empoloyee', [EmployeeController::class, 'store'])->name('store.employee');
    Route::get('/all-employee', [EmployeeController::class, 'AllEmployee'])->name('all.employee');
    Route::get('/destroy-employee/{id}', [EmployeeController::class, 'DestroyEmployee'])->name('destroy.employee');
    Route::get('/delete-employee/{id}', [EmployeeController::class, 'DeleteEmployee'])->name('delete.employee');
    Route::get('/restore-employee/{id}', [EmployeeController::class, 'RestoreEmployee'])->name('restore.employee');
    Route::get('/view-employee/{id}', [EmployeeController::class, 'ViewEmployee'])->name('view.employee');
    Route::get('/edit-employee/{id}', [EmployeeController::class, 'EditEmployee'])->name('edit.employee');
    Route::post('/update-employee/{id}', [EmployeeController::class, 'UpdateEmployee'])->name('update.employee');

    // CUSTOMER ROUTE START 
    Route::get('/add-customer', [CustomerController::class, 'index'])->name('add.customer');
    Route::post('/store-customer', [CustomerController::class, 'store'])->name('store.customer');
    Route::get('/all-customer', [CustomerController::class, 'AllCustomer'])->name('all.customer');
    Route::get('/destroy-customer/{id}', [CustomerController::class, 'DestroyCustomer'])->name('destroy.customer');
    Route::get('/delete-customer/{id}', [CustomerController::class, 'DeleteCustomer'])->name('delete.customer');
    Route::get('/restore-customer/{id}', [CustomerController::class, 'RestoreCustomer'])->name('restore.customer');
    Route::get('/view-customer/{id}', [CustomerController::class, 'ViewCustomer'])->name('view.customer');
    Route::get('/edit-customer/{id}', [CustomerController::class, 'EditCustomer'])->name('edit.customer');
    Route::post('/update-customer/{id}', [CustomerController::class, 'UpdateCustomer'])->name('update.customer');

    // SUPPLIER ROUTE START 
    Route::get('/add-supplier', [SupplierController::class, 'index'])->name('add.supplier');
    Route::post('/store-supplier', [SupplierController::class, 'store'])->name('store.supplier');
    Route::get('/all-supplier', [SupplierController::class, 'AllSupplier'])->name('all.supplier');
    Route::get('/destroy-supplier/{id}', [SupplierController::class, 'DestroySupplier'])->name('destroy.supplier');
    Route::get('/restore-supplier/{id}', [SupplierController::class, 'RestoreSupplier'])->name('restore.supplier');
    Route::get('/delete-supplier/{id}', [SupplierController::class, 'DeleteSupplier'])->name('delete.supplier');
    Route::get('/view-supplier/{id}', [SupplierController::class, 'ViewSupplier'])->name('view.supplier');
    Route::get('/edit-supplier/{id}', [SupplierController::class, 'EditSupplier'])->name('edit.supplier');
    Route::post('/update-supplier/{id}', [SupplierController::class, 'UpdateSupplier'])->name('update.supplier');

    // SALARY ROUTE START 
    Route::get('/add-advance-salary', [SalaryController::class, 'AddAdvanceSalary'])->name('add.advance.salary');
    Route::post('/store-advance-salary', [SalaryController::class, 'StoreAdvanceSalary'])->name('store.advance.salary');
    Route::get('/all-advance-salary', [SalaryController::class, 'AllAdvanceSalary'])->name('all.advance.salary');
    Route::get('/edit_advance_salary/{id}', [SalaryController::class, 'EditAdvanceSalary'])->name('edit.advance.salary');
    Route::post('/update-advance-salary/{id}', [SalaryController::class, 'UpdateAdvanceSalary'])->name('update.advance.salary');
    Route::get('/destroy-advance-salary/{id}', [SalaryController::class, 'DestroyAdvanceSalary'])->name('destroy.advance.salary');
    Route::get('/pay-salary', [SalaryController::class, 'PaySalary'])->name('pay.salary');

    //CATEGORY ROUTE START
    Route::get('/add-category', [CategoryController::class, 'AddCategorty'])->name('add.category');
    Route::post('/store-category', [CategoryController::class, 'StoreCategorty'])->name('store.category');
    Route::get('/all-category', [CategoryController::class, 'AllCategorty'])->name('all.category');
    Route::get('/delete-category/{id}', [CategoryController::class, 'DeleteCategorty'])->name('delete.category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
    Route::post('/update-category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');

    // PRODUCT ROUTE START 
    Route::resource('product', ProductController::class);
    Route::get('/product-restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
    Route::get('/product-delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    // EXPENSE ROUTE START
    Route::resource('expense', ExpenseController::class);
    Route::get('/monthly-expense', [ExpenseController::class, 'MonthlyExpense'])->name('monthly.expense');
    Route::get('/yearly-expense', [ExpenseController::class, 'YearlyExpense'])->name('yearly.expense');
    //monthly expense
    Route::get('/january-expense', [ExpenseController::class, 'JanuaryExpense'])->name('january.expense');
    Route::get('/february-expense', [ExpenseController::class, 'FebruaryExpense'])->name('february.expense');
    Route::get('/march-expense', [ExpenseController::class, 'MarchExpense'])->name('march.expense');
    Route::get('/april-expense', [ExpenseController::class, 'AprilExpense'])->name('april.expense');
    Route::get('/may-expense', [ExpenseController::class, 'MayExpense'])->name('may.expense');
    Route::get('/june-expense', [ExpenseController::class, 'JuneExpense'])->name('june.expense');
    Route::get('/july-expense', [ExpenseController::class, 'JulyExpense'])->name('july.expense');
    Route::get('/august-expense', [ExpenseController::class, 'AugustExpense'])->name('august.expense');
    Route::get('/september-expense', [ExpenseController::class, 'SeptemberExpense'])->name('september.expense');
    Route::get('/october-expense', [ExpenseController::class, 'OctoberExpense'])->name('october.expense');
    Route::get('/november-expense', [ExpenseController::class, 'NovemberExpense'])->name('november.expense');
    Route::get('/december-expense', [ExpenseController::class, 'DecemberExpense'])->name('december.expense');

    //ATTENDENCE ROUTE START
    Route::resource('attendence', AttendenceController::class);
    Route::get('/edit-attendence/{att_date}', [AttendenceController::class, 'EditAttendence'])->name('edit.attendence');
    Route::post('/update-attendence/{att_date}', [AttendenceController::class, 'UpdateAttendence'])->name('Update.attendence');
    Route::get('/show-attendence/{att_date}', [AttendenceController::class, 'ShowAttendence'])->name('show.attendence');
    Route::get('/delete-attendence/{att_date}', [AttendenceController::class, 'DeleteAttendence'])->name('delete.attendence');

    //SETTING ROUTE STRAT
    Route::resource('setting', SettingController::class);

    //POS ROUTE START
    Route::resource('pos', PosController::class);
});







require __DIR__.'/auth.php';
