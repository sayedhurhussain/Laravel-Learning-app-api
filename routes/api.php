<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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
Route::post('/register', [UserController::class, 'register']);
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