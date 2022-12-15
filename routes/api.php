<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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
// Registration/ Signup Route
Route::post('signup', [UserController::class, 'register']);
// Login Route/API
Route::post('/user/login', [UserController::class, 'login']);
// Send Forgot Password Link to Mail API
Route::post('/password/email', [AuthController::class, 'sendPasswordResetLinkEmail'])->middleware('throttle:5,1')->name('password.email');
// Reset Password API
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');

// protected Route
Route::group(['middleware' => ['auth:sanctum']], function() {
    // Get Authenticated User
    Route::get('/getAuthUser', [AuthController::class, 'getAuthenticatedUser']);
    // Change/Update Password
    Route::post('/password/change', [AuthController::class, 'changePassword'])->name('change.password');
    // Logout Route
    Route::post('/user/logout', [UserController::class, 'logout']);
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

    Route::prefix('blog')->group(function () {
        Route::post('/create', [BlogController::class, 'store']);
        // Update/Edit user Details
        Route::put('/update/{id}', [BlogController::class, 'update']);
        // Index/get all user Details
        Route::get('/index', [BlogController::class, 'index']);
        // Index/get all user Details
        Route::get('/show/{id}', [BlogController::class, 'show']);
        // Index/get all user Details
        Route::delete('/delete/{id}', [BlogController::class, 'destroy']);
    });
    


});



Route::get('/index', [UserController::class, 'index']);



// Route::post('/register', function(){  
//     return User::create([
//         'name'=>'sayed',
//         'email'=>'sayed@gmail.com',
//         'password'=>'12345678'
//     ]);
//     });