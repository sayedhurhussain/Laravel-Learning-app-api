<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDetailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Public Route/API
// Regiseration/ Signup Route
Route::post('signup', [UserController::class, 'register']);
// Create/Store user Details
Route::post('/create', [UserDetailController::class, 'store']);
// Update/Edit user Details
Route::put('/update/{id}', [UserDetailController::class, 'update']);
// Index/get all user Details
Route::get('/userDetail/index', [UserDetailController::class, 'index']);
// Index/get all user Details
Route::get('/userDetailById/{id}', [UserDetailController::class, 'show']);
// Index/get all user Details
Route::delete('/userDetailDelete/{id}', [UserDetailController::class, 'destroy']);

// // Index/get all user Details
// Route::get('/userDetail/index/{id}', [UserDetailController::class, 'index']);
// Login Route/API
Route::post('/user/login', [UserController::class, 'login']);
// Send Forgot Password Link to Mail API
Route::post('/password/email', [AuthController::class, 'sendPasswordResetLinkEmail'])->middleware('throttle:5,1')->name('password.email');
// Reset Password API
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');

// protected Route
Route::group(['middleware' => ['auth:sanctum']], function() {
    // Change/Update Password
    Route::post('changePassword', [AuthController::class, 'changePassword'])->name('change.password');
    // Logout Route
    Route::post('/user/logout', [UserController::class, 'logout']);
});

Route::get('/index', [UserController::class, 'index']);

Route::get('/getAuthenticatedUser', [AuthController::class, 'getAuthenticatedUser']);

// Route::post('/register', function(){  
//     return User::create([
//         'name'=>'sayed',
//         'email'=>'sayed@gmail.com',
//         'password'=>'12345678'
//     ]);
//     });