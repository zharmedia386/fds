<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bases', function (Blueprint $table) {
            $table->id();
            $table->decimal('income');
            $table->decimal('name_email_similarity');
            $table->integer('prev_address_months_count');
            $table->integer('current_address_months_count');
            $table->integer('customer_age');
            $table->integer('days_since_request');
            $table->decimal('intended_balcon_amount');
            $table->integer('zip_count_4w');
            $table->integer('velocity_6h');
            $table->integer('velocity_24h');
            $table->integer('velocity_4w');
            $table->integer('bank_branch_count_8w');
            $table->integer('date_of_birth_distinct_emails_4w');
            $table->integer('credit_risk_score');
            $table->boolean('email_is_free');
            $table->boolean('phone_home_valid');
            $table->boolean('phone_mobile_valid');
            $table->integer('bank_months_count');
            $table->boolean('has_other_cards');
            $table->decimal('proposed_credit_limit');
            $table->boolean('foreign_request');
            $table->integer('session_length_in_minutes');
            $table->boolean('keep_alive_session');
            $table->integer('device_distinct_emails_8w');
            $table->integer('device_fraud_count');
            $table->string('month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bases');
    }
};
