<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users;

class OTPVerificationController extends Controller
{
    public function index()
    {
        return view('components.auth.otp-verification');
        // return redirect()->route('otp-verification');
    }

    public function verify(Request $request)
    {
        // Get individual OTP digits from the form fields
        $otp1 = $request->input('otp1');
        $otp2 = $request->input('otp2');
        $otp3 = $request->input('otp3');
        $otp4 = $request->input('otp4');
        $otp5 = $request->input('otp5');
        $otp6 = $request->input('otp6');

        // Concatenate OTP digits into a single OTP string
        $userInputOTP = $otp1 . $otp2 . $otp3 . $otp4 . $otp5 . $otp6;

        $otpFromAPI = $request->session()->get('otpFromAPI'); // Retrieve the OTP from the session

        // Compare the user's input OTP with $otpFromAPI
        if ($userInputOTP === $otpFromAPI) {
            // Update activation_status, acount_status, verified
            Users::where('id', $request->session()->get('user_id'))
            ->update([
                'otp_verified' => 1,
            ]);

            // OTP is correct, redirect to the home page with a success message
            return redirect()->route('welcome')->with('success', 'Registration successful');
        } else {
            // OTP is incorrect, display an error message
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }
    }
}