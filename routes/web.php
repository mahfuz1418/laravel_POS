<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SalesReport;
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
    Route::get('/pay-salary', [SalaryController::class, 'paySalary'])->name('pay.salary');
    Route::get('/pay-now/{id}', [SalaryController::class, 'payNow'])->name('pay.now');
    Route::post('/pay-confirm/{id}', [SalaryController::class, 'payConfirm'])->name('pay.confirm');
    Route::get('/salary-data', [SalaryController::class, 'salaryData'])->name('salary.data');
    Route::get('/advance-salary/{id}', [SalaryController::class, 'advanceSalary'])->name('advance.salary');
    Route::post('/advance-store/{id}', [SalaryController::class, 'advanceStore'])->name('advance.store');
    Route::get('/all-advance', [SalaryController::class, 'allAdvance'])->name('all.advance');


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
    Route::get('/product-export', [ProductController::class, 'export'])->name('product.export');
    Route::post('/product-import', [ProductController::class, 'import'])->name('product.import');

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
    Route::post('/invoice', [PosController::class, 'ViewInvoice'])->name('view.invoice');
    Route::get('/pending-order', [PosController::class, 'PendingOrder'])->name('pending.order');
    Route::get('/approved-order', [PosController::class, 'ApprovedOrder'])->name('approved.order');
    Route::get('/confirm-order/{id}', [PosController::class, 'ConfirmOrder'])->name('confirm.order');

    //SHOPPING CART ROUTE START
    Route::post('/add-cart', [CartController::class, 'AddCart'])->name('add.cart');
    Route::post('/update-cart/{rowId}', [CartController::class, 'UpdateCart'])->name('update.cart');
    Route::get('/remove-cart/{rowId}', [CartController::class, 'RemoveCart'])->name('remove.cart');
    Route::post('/invoice', [CartController::class, 'ViewInvoice'])->name('view.invoice');
    Route::post('/final-invoice', [CartController::class, 'FinalInvoice'])->name('final.invoice');
    Route::post('/update-invoice/{id}', [CartController::class, 'UpdateInvoice'])->name('update.invoice');

    //SALES REPORT
    Route::get('/today-sales-report', [SalesReport::class, 'SalesReport'])->name('sales.report');
    Route::get('/all-sales-report', [SalesReport::class, 'AllSalesReport'])->name('all.sales.report');
    Route::post('/date-sales-report', [SalesReport::class, 'DateSalesReport'])->name('date.sales.report');

});







require __DIR__.'/auth.php';
