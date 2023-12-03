<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;
    protected $table = 'bases'; 

    protected $fillable = [
        'income',
        'name_email_similarity',
        'prev_address_months_count',
        'current_address_months_count',
        'customer_age',
        'days_since_request',
        'intended_balcon_amount',
        'zip_count_4w',
        'velocity_6h',
        'velocity_24h',
        'velocity_4w',
        'bank_branch_count_8w',
        'date_of_birth_distinct_emails_4w',
        'credit_risk_score',
        'email_is_free',
        'phone_home_valid',
        'phone_mobile_valid',
        'bank_months_count',
        'has_other_cards',
        'proposed_credit_limit',
        'foreign_request',
        'session_length_in_minutes',
        'keep_alive_session',
        'device_distinct_emails_8w',
        'device_fraud_count',
        'month',
        'predict_fraud_proba',
    ];
}

