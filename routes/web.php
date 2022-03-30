<?php

use App\Http\Controllers\AdvertisementAppealController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\EmployeeUserContactInformationController;
use App\Http\Controllers\EmployeeUserSummaryInformationController;
use App\Http\Controllers\EmployeeUserSummaryExplanationController;
use App\Http\Controllers\EmployeeUserWorkExperienceController;
use App\Http\Controllers\EmployeeUserEducationInformationController;
use App\Http\Controllers\EmployeeUserForeignLanguageController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

//if (Auth::guard('employee_user')->check()){
//    Route::get('/',[HomeController::class,'employee_index'])->name('employee_index');
//}else{
//    Route::get('/',[HomeController::class,'index'])->name('index');
//}

Route::view('/', 'home');

Route::prefix('/login')->group(function () {
    Route::get('/', [LoginController::class, 'showEmployeeUserLoginForm'])->name('login');
    Route::get('/employer-user', [LoginController::class, 'showEmployerUserLoginForm'])->name('employer_user.login_form');
    Route::get('/employee-user', [LoginController::class, 'showEmployeeUserLoginForm'])->name('employee_user.login_form');
    Route::post('/employer-user', [LoginController::class, 'employerUserLogin'])->name('employer_user.login');
    Route::post('/employee-user', [LoginController::class, 'employeeUserLogin'])->name('employee_user.login');
});

Route::prefix('/register')->group(function () {
    Route::get('/employer-user', [RegisterController::class, 'showEmployerUserRegisterForm'])->name('employer_user.register_form');
    Route::get('/employee-user', [RegisterController::class, 'showEmployeeUserRegisterForm'])->name('employee_user.register_form');
    Route::post('/employer-user', [RegisterController::class, 'createEmployerUser'])->name('employer_user.create_employer_user');
    Route::post('/employee-user', [RegisterController::class, 'createEmployeeUser'])->name('employee_user.create_employee_user');
});

Route::prefix('country')->group(function () {
    Route::get('/getList', [CountryController::class, 'getList'])->name('country.getList');
    Route::post('/getListDistrictByCountry', [CountryController::class, 'getListDistrictByCountry'])->name('country_districts.getListByCountry');
});

//Route::get('/featured',[AdvertisementController::class,'featuredList'])->
Route::prefix('/is-ilanlari')->group(function () {
    Route::get('/', [AdvertisementController::class, 'allAdvertisement'])->name('all_advertisement');
    Route::get('/detay/{advertisement}', [AdvertisementController::class, 'detailAdvertisement'])->name('detailAdvertisement');
});


Route::group(['middleware' => 'auth:employee_user'], function () {
    Route::get('/employee-user', [EmployeeController::class, 'index'])->name('employee_index');

    Route::prefix('employee-user')->name('employeeUser.')->group(function () {
        Route::get('/get-user', [EmployeeController::class, 'getUser'])->name('getUser');
        Route::post('/update-user-information/{employeeUser}', [EmployeeController::class, 'updateUserInformation'])->name('updateUserInformation');
        Route::post('/update-user-password', [EmployeeController::class, 'updateUserPassword'])->name
        ('updateUserPassword');
    });

    Route::post('/file-store', [FileUploadController::class, 'store'])->name('file.store');

    Route::prefix('/appeal-advertisements')->name('appeal_advertisements.')->group(function () {
        Route::get('/create/{advertisement}', [AdvertisementAppealController::class, 'createAppeal'])->name('createAppeal');
        Route::get('/getList', [AdvertisementAppealController::class, 'getListByEmployee'])->name('getListByEmployee');
    });

    Route::prefix('/cv')->name('cv.')->group(function (){
       Route::post('/update-contact-info',[EmployeeUserContactInformationController::class,'updateContactInformation'])
           ->name('updateContactInformation');
        Route::post('/update-summary-info',[EmployeeUserSummaryInformationController::class,'updateSummaryInformation'])
            ->name('updateSummaryInformation');

        Route::post('/update-summary-explan',[EmployeeUserSummaryExplanationController::class,'updateSummaryExplanation'])
            ->name('updateSummaryExplanation');

        Route::post('/update-work-exp',[EmployeeUserWorkExperienceController::class,'updateWorkExperience'])
            ->name('updateWorkExperience');
        Route::get('/update-work-exp/{workExperience}',[EmployeeUserWorkExperienceController::class,'deleteWorkExperience'])
            ->name('deleteWorkExperience');

        Route::post('/update-education-info',[EmployeeUserEducationInformationController::class,'updateEducationInformation'])
            ->name('updateEducationInformation');
        Route::get('/delete-education-info/{educationInformation}',[EmployeeUserEducationInformationController::class,'deleteEducationInformation'])
            ->name('deleteEducationInformation');

        Route::post('/update-foreign-lang',[EmployeeUserForeignLanguageController::class,'updateForeignLanguage'])
            ->name('updateForeignLanguage');
        Route::get('/delete-foreign-lang/{foreignLanguage}',[EmployeeUserForeignLanguageController::class,'deleteForeignLanguage'])
            ->name('deleteForeignLanguage');
    });
});

Route::group(['middleware' => 'auth:employer_user'], function () {
    Route::get('/employer-user', [EmployerController::class, 'index'])->name('employer_index');
//    Route::get('/employer-user/settings',[EmployerController::class,'employerSettings'])->name('employee_settings');
    Route::prefix('employer-user')->name('employerUser.')->group(function () {
        Route::get('/get-user', [EmployerController::class, 'getUser'])->name('getUser');
        Route::post('/update-user-information/{employerUser}', [EmployerController::class, 'updateUserInformation'])
            ->name('updateUserInformation');
        Route::post('/update-user-password', [EmployerController::class, 'updateUserPassword'])->name
        ('updateUserPassword');

        Route::prefix('advertisements')->name('advertisements.')->group(function () {
            Route::post('/new-advertisement', [AdvertisementController::class, 'updateAdvertisement'])->name('updateAdvertisement');
            Route::get('/getList', [AdvertisementController::class, 'getList'])->name('getList');
            Route::get('/editOnPublication/{advertisement}', [AdvertisementController::class, 'editOnPublication'])
                ->name('editOnPublication');
            Route::post('/updateOnPublication/{advertisement}', [AdvertisementController::class, 'updateOnPublication'])
                ->name('updateOnPublication');
            Route::get('/edit/{advertisement}', [AdvertisementController::class, 'editAdvertisement'])->name('editAdvertisement');
            Route::post('/update/{advertisement}', [AdvertisementController::class, 'updateEditAdvertisement'])->name('updateEditAdvertisement');
        });

        Route::prefix('/appeal-advertisements')->name('appeal_advertisements.')->group(function () {
            Route::get('/viewUserAppealedUser/{advertisement}', [AdvertisementAppealController::class, 'viewUserAppealedUser'])->name('viewUserAppealedUser');
            Route::get('/getListByAdvertisement/{advertisement}', [AdvertisementAppealController::class, 'getListByAdvertisement'])->name('getListByAdvertisement');
        });

    });
});

Route::group(['middleware' => 'auth:employer_user,employee_user'], function () {
    Route::get('/file-download/{employeeUser}', [FileUploadController::class, 'download'])->name('file.download');
    Route::get('/previewCv/{employeeUser?}',[EmployeeController::class,'previewCv'])->name('previewCv');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');