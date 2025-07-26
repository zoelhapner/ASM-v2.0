<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountingAccountController;
use App\Http\Controllers\AccountingJournalController;
use App\Http\Controllers\AccountingClosingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LicensesController;
use App\Http\Controllers\LicenseHoldersController;
use App\Http\Controllers\LicenseHolderEducationController;
use App\Http\Controllers\LicenseHolderWorkExperience;
use App\Http\Controllers\LicenseHolderFamilyMember;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeEducationController;
use App\Http\Controllers\EmployeeWorkExperienceController;
use App\Http\Controllers\EmployeeFamilyMemberController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LicenseImportController;
use App\Http\Controllers\UserImportController;






Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'permission:lisensi.tambah'])->group(function () {
    Route::resource('/licenses', LicensesController::class)->only(['create', 'store']);
});

Route::middleware(['auth', 'permission:lisensi.ubah'])->group(function () {
    Route::resource('/licenses', LicensesController::class)->only(['edit', 'update']);
});

Route::middleware(['auth', 'role:Super-Admin|Pemilik Lisensi'])->group(function () {
    Route::resource('/licenses', LicensesController::class)->only(['index', 'show', 'destroy']);
});

Route::middleware(['auth', 'permission:pemilik-lisensi.tambah'])->group(function () {
    Route::resource('/license_holders', LicenseHoldersController::class)->only(['create', 'store']);
});

Route::middleware(['auth', 'permission:pemilik-lisensi.ubah'])->group(function () {
    Route::resource('/license_holders', LicenseHoldersController::class)->only(['edit', 'update']);
});

Route::middleware(['auth', 'role:Super-Admin|Pemilik Lisensi'])->group(function () {
    Route::resource('/license_holders', LicenseHoldersController::class)->only(['index', 'show', 'destroy']);
});

Route::middleware(['auth', 'role:Super-Admin|Karyawan'])->group(function () {
    route::resource('/employees', EmployeeController::class);
});

Route::resource('students', StudentsController::class);

Route::middleware(['auth', 'role:Super-Admin|Akuntan'])
        ->resource('accounting', AccountingAccountController::class)
         ->parameters(['accounting' => 'account']);

Route::get('/journals/report', [AccountingJournalController::class, 'report'])
    ->name('journals.report')
    ->middleware(['role:Super-Admin|Akuntan']);

Route::middleware(['role:Super-Admin|Akuntan'])->group(function () {
    Route::resource('journals', AccountingJournalController::class);
});

Route::get('/periods/close', [AccountingClosingController::class, 'showCloseForm'])->name('periods.close.form');
Route::post('/periods/close', [AccountingClosingController::class, 'close'])->name('periods.close');


Route::middleware(['auth', 'role:Super-Admin'])->group(function () {
    Route::resource('roles', RoleController::class);
});




Route::middleware(['auth', 'role:Super-Admin|Pemilik Lisensi'])->group(function () {
    route::resource('/users', UsersController::class);
});

Route::get('/license_holders/{id}/licenses', [LicenseHoldersController::class, 'showLicense'])->name('license_holders.licenses');
Route::get('/license_holders/{id}/profile', [LicenseHoldersController::class, 'showProfile'])->name('license_holders.profile');
Route::get('/license_holders/{id}/educations', [LicenseHoldersController::class, 'showTab'])->name('license_holders.educations');
Route::get('/license_holders/{id}/workers', [LicenseHoldersController::class, 'showWorks'])->name('license_holders.workers');
Route::get('/license_holders/{id}/families', [LicenseHoldersController::class, 'showFams'])->name('license_holders.families');



route::resource('/license_holder_educations', LicenseHolderEducationController::class);
route::resource('/license_holder_workers', LicenseHolderWorkExperience::class);
route::resource('/license_holder_families', LicenseHolderFamilyMember::class);

Route::get('/employees/{id}/profile', [EmployeeController::class, 'showProfile'])->name('employees.profile');
Route::get('/employees/{id}/educations', [EmployeeController::class, 'showTab'])->name('employees.educations');
Route::get('/employees/{id}/workers', [EmployeeController::class, 'showWorks'])->name('employees.workers');
Route::get('/employees/{id}/families', [EmployeeController::class, 'showFams'])->name('employees.families');

route::resource('/employee_educations', EmployeeEducationController::class);
route::resource('/employee_workers', EmployeeWorkExperienceController::class);
route::resource('/employee_families', EmployeeFamilyMemberController::class);


Route::get('/api/cities/{province_id}', function ($province_id) {
    return \App\Models\City::where('province_id', $province_id)->select('id', 'name')->get();
});

Route::get('/api/districts/{city_id}', function ($city_id) {
    return \App\Models\District::where('city_id', $city_id)->select('id', 'name')->get();
});

Route::get('/api/sub_districts/{district_id}', function ($district_id) {
    return \App\Models\SubDistrict::where('district_id', $district_id)->select('id', 'name')->get();
});

Route::get('/api/postal_codes/{sub_district_id}', function ($sub_district_id) {
    return \App\Models\PostalCode::where('sub_district_id', $sub_district_id)->select('id', 'postal_code')->get();
});



Route::get('/import-licenses', [LicenseImportController::class, 'showForm'])->name('licenses.import.form');
Route::post('/import-licenses', [LicenseImportController::class, 'import'])->name('licenses.import');

Route::get('/import-users', [UserImportController::class, 'showForm'])->name('users.import.form');
Route::post('/import-users', [UserImportController::class, 'import'])->name('users.import');


