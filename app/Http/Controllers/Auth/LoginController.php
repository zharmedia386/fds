<?php

namespace App\Http\Controllers\Auth;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
             // Create session for user_id and phone_number
            $email = $request->input('email');
            $user = Users::where('email', $email)->first();

            $request->session()->put('user_id', $user->id);
            $request->session()->put('phone_number', $user->phone_number);

            DB::commit();

            $apiUrl = 'http://103.82.242.246:3000/send-otp';

            $client = new Client();
            $response = $client->post($apiUrl, [
                'json' => [
                    'phoneNumber' => $user->phone_number,
                ],
            ]);
            
            // Decode the JSON response to an array
            $responseData = json_decode($response->getBody(), true);

            // Create OTP session
            $otpFromAPI = $responseData['otp'];
            $request->session()->put('otpFromAPI', $otpFromAPI);

            return redirect()->route('otp-verification')->with('loginSuccess', 'Account created successfully!');
        }

        // Authentication failed
        return redirect('/login')->with('loginError', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
