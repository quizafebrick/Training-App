<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ControllerView;
use App\Http\Controllers\StudentAccountSettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\UserController;
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

// * ROUTE FOR PUBLIC VIEWING * //

Route::get('/', [ControllerView::class, 'adminLogin'])->name('login');
Route::get('/student', [ControllerView::class, 'studentLogin'])->name('student-login');
Route::get('/register', [ControllerView::class, 'register'])->name('register');
Route::post('/register-save', [UserController::class, 'storePublic'])->name('store');

Route::post('/login-check', [UserController::class, 'check'])->name('user-check');
Route::post('/student-login-check', [StudentController::class, 'check'])->name('student-check');


Route::group(['middleware' => ['adminLoggedIn']], function () {
    // * ROUTE FOR ADMIN CONTROLLER * //
    Route::get('/a', [UserController::class, 'index'])->name('user-index');
    Route::get('/a/users', [UserController::class, 'create'])->name('user-index-admin');
    Route::post('a/save-user', [UserController::class, 'storeLoggedInAdmin'])->name('user-store');
    Route::get('/logout', [UserController::class, 'logout'])->name('user-logout');

    // * ROUTE FOR STUDENT CONTROLLER * //
    Route::get('/a/students', [StudentController::class, 'students'])->name('student-list');
    Route::get('/a/add-student', [StudentController::class, 'create'])->name('student-add');
    Route::post('/a/student-info-save', [StudentController::class, 'store'])->name('student-info-save');
    Route::get('/a/edit-student/{id}', [StudentController::class, 'edit'])->name('student-edit');
    Route::put('/a/update-student/{id}', [StudentController::class, 'update'])->name('student-update');
    Route::get('/a/delete-student/{id}', [StudentController::class, 'destroy'])->name('student-delete');
    Route::get('/a/pdf-download', [StudentController::class, 'downloadPDF'])->name('student-download-pdf');
    Route::get('/a/excel-export', [StudentController::class, 'exportExcel'])->name('student-download-excel');
    Route::post('/a/excel-import', [StudentController::class, 'importExcel'])->name('student-import-excel');

    // * ROUTE FOR ANNOUNCEMENT CONTROLLER * //
    Route::get('/a/annoucements', [AnnouncementController::class, 'index'])->name('announcement-list');
    Route::get('/a/add-annoucement', [AnnouncementController::class, 'create'])->name('announcement-add');
    Route::post('/a/save-annoucement', [AnnouncementController::class, 'store'])->name('announcement-save');
    Route::get('/a/edit-announcement/{id}', [AnnouncementController::class, 'edit'])->name('announcement-edit');
    Route::put('/a/update-announcement/{id}', [AnnouncementController::class, 'update'])->name('announcement-update');
    Route::get('/a/delete-announcement/{id}', [AnnouncementController::class, 'destroy'])->name('announcement-destroy');
});


Route::group(['middleware' => ['studentLoggedIn']], function () {
    // * ROUTE FOR STUDENT CONTROLLER * //
    Route::get('/s', [StudentController::class, 'index'])->name('student-index');
    Route::get('/s/logout', [StudentController::class, 'logout'])->name('student-logout');

    // * ROUTE FOR STUDENT PROFILE CONTROLLER * //
    Route::get('/s/profile/{id}', [StudentProfileController::class, 'edit'])->name('student-profile-index');
    Route::put('/s/profile/update-profile/{id}', [StudentProfileController::class, 'update'])->name('student-update-profile');

    // * ROUTE FOR STUDENT ACCOUNT SETTINGS CONTROLLER * //
    Route::get('/s/account-settings/{id}', [StudentAccountSettingController::class, 'edit'])->name('student-account-settings');
    Route::post('/verify-old-password/', [StudentAccountSettingController::class, 'check'])->name('student-verify-password');
    Route::post('/update-student-account/{id}', [StudentAccountSettingController::class, 'changePassword'])->name('student-change-password');
});
