<?php

namespace App\Http\Controllers;

use App\Models\Base;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'income' => 'required|numeric',
                'name_email_similarity' => 'required|numeric',
                'prev_address_months_count' => 'required|integer',
                'current_address_months_count' => 'required|integer',
                'customer_age' => 'required|integer',
                'days_since_request' => 'required|numeric',
                'intended_balcon_amount' => 'required|numeric',
                'zip_count_4w' => 'required|integer',
                'velocity_6h' => 'required|numeric',
                'velocity_24h' => 'required|numeric',
                'velocity_4w' => 'required|numeric',
                'bank_branch_count_8w' => 'required|integer',
                'date_of_birth_distinct_emails_4w' => 'required|integer',
                'credit_risk_score' => 'required|integer',
                'email_is_free' => 'required|integer',
                'phone_home_valid' => 'required|integer',
                'phone_mobile_valid' => 'required|integer',
                'bank_months_count' => 'required|integer',
                'has_other_cards' => 'required|integer',
                'proposed_credit_limit' => 'required|integer',
                'foreign_request' => 'required|integer',
                'session_length_in_minutes' => 'required|numeric',
                'keep_alive_session' => 'required|integer',
                'device_distinct_emails_8w' => 'required|numeric',
                'device_fraud_count' => 'required|integer',
                'month' => 'required|integer',
            ]);

            $base = Base::create($data);

            return response()->json(['message' => 'Record stored successfully', 'data' => $base], 201);
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['error' => $e->validator->errors()], 400);
        }
    }
}
