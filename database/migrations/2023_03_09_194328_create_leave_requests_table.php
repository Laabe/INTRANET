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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('team_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('leave_type_id');
            $table->float('number_of_days');
            $table->float('deducted_holidays_amount')->default(0);
            $table->float('deducted_paid_leaves_amount')->default(0);
            $table->string('status')->default('pending');
            $table->text('leave_request_motive')->nullable();
            $table->text('rejecting_motive')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
