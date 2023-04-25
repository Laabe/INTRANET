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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->integer('number_of_kids')->nullable()->default(0);
            $table->date('integration_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
            $table->foreignId('profile_id')->nullable();
            $table->foreignId('manager_id')->nullable();
            $table->foreignId('recrutment_platforme_id')->nullable();
            $table->foreignId('sourcing_type_id')->nullable();
            $table->foreignId('gender_id')->nullable();
            $table->foreignId('identity_document_id')->nullable();
            $table->string('identity_document_number')->nullable();
            $table->string('social_security_number')->nullable();
            $table->foreignId('language_id')->nullable();
            $table->foreignId('language_level_id')->nullable();
            $table->foreignId('marital_status_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->string('image')->nullable();
            $table->string('termination_reason')->nullable();
            $table->string('termination_comment')->nullable();
            $table->float('paid_leaves_balance')->default(0);
            $table->float('holidays_balance')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
