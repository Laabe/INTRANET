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
        Schema::create('workflow_stage_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workflow_stage_id');
            $table->foreignId('leave_request_id');
            $table->enum('status', ['pending', 'Approved', 'Rejected']);
            $table->foreignId('treated_by')->nullable();
            $table->date('treated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_stage_approvals');
    }
};
