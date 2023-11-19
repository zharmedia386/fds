<?php

namespace App\Http\Controllers\Auth;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Users::create([
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Create session for user_id and phone_number
        $request->session()->put('user_id', $user->id);
        $request->session()->put('phone_number', $validatedData["phone_number"]);

        DB::commit();

        $apiUrl = 'http://103.82.242.246:3000/send-otp';

        $client = new Client();
        $response = $client->post($apiUrl, [
            'json' => [
                'phoneNumber' => $validatedData["phone_number"],
            ],
        ]);
        
        // Decode the JSON response to an array
        $responseData = json_decode($response->getBody(), true);

        // Create OTP session
        $otpFromAPI = $responseData['otp'];
        $request->session()->put('otpFromAPI', $otpFromAPI);

        return redirect()->route('otp-verification')->with('registerSuccess', 'Account created successfully!');
    }
}
