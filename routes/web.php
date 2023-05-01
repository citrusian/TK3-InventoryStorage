<?php

use App\Http\Controllers\EditItemController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\KTPUploadController;
use App\Http\Controllers\RegisterBarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ImageUploadController;

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



Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
//	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
//	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::get('upload-image', [ ImageUploadController::class, 'index' ]);
Route::post('upload-image', [ ImageUploadController::class, 'store' ])->name('image.store');


Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile2', [UserProfileController::class, 'ktp'])->name('profile_ktp');
//    workaround: use unused url+rand if you want to use 2 invoke in one page
//    eg: profile.update = invoke1, profile_ktp = invoke2

    Route::get('/itemData', [PageController::class, 'itemData'])->name('itemData');
    Route::get('/transactionData', [PageController::class, 'transactionData'])->name('transactionData');
    Route::get('/user_management', [PageController::class, 'user_management'])->name('user_management');
    Route::get('/new_user', [UserProfileController::class, 'show_new'])->name('show_new');
    Route::post('/new_user', [UserProfileController::class, 'new'])->name('profile_new');

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');

    Route::get('/registerbarang', [RegisterBarangController::class, 'create'])->name('registerbarang');
    Route::post('/registerbarang', [RegisterBarangController::class, 'store'])->name('registerbarang.perform');

    Route::get('/edituser', [EditProfileController::class, 'show'])->name('editeuser');
    Route::post('/edituser', [EditProfileController::class, 'updateuser'])->name('updateuser');
    Route::post('/edituser2', [EditProfileController::class, 'updatektp'])->name('updatektp');

    Route::get('/edititem', [EditItemController::class, 'show'])->name('edititem');
    Route::post('/edititem', [EditItemController::class, 'updateitem'])->name('updateitem');
//    Route::post('/edititem2', [EditItemController::class, 'updateimage'])->name('updateimage');

//  page route must be placed below other
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');







});
