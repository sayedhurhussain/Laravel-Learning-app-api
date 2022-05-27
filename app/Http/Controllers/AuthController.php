<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

use App\Rules\MatchOldPassword;

use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;




class AuthController extends Controller
{
    //Change/Update Password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:8|different:current_password',
            'new_confirm_password' => 'required|same:new_password',
        ]);
        User::find(auth()->user()->id)->update(['password'=>Hash::make($request->new_password)]);
        auth()->user()->tokens()->delete();
        return response(['message'=>'Password change successfully: Logout from all the devices']);
    }
    
    //Send forgot password email
	public function sendPasswordResetLinkEmail(Request $request) {
		$request->validate(['email' => 'required|email']);
    
		$status = Password::sendResetLink(
			$request->only('email')
		);
        // dd($request);
		if($status === Password::RESET_LINK_SENT) {
			return response()->json(['message' => __($status)], 200);
		} else {
			throw ValidationException::withMessages([
				'email' => __($status)
			]);
		}
        
    	}

    //Reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' =>Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
        if($status == Password::PASSWORD_RESET) {
            return response()->json(['message' => __($status)], 200);
        } else {
            throw ValidationException::withMessages([
                'email' => __($status)
            ]);
        }
    }

    /*
	 * Get authenticated user details
	*/
	public function getAuthenticatedUser(Request $request) {
		// return $request->user();
        return User::all();
        // dd($request);
	}
 
}
