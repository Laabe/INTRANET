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
        Schema::create('balance_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->text('comment');
            $table->float('added_paid_leaves')->default(0);
            $table->float('deducted_paid_leaves')->default(0);
            $table->float('paid_leaves_balance');
            $table->float('added_holidays')->default(0);
            $table->float('deducted_holidays')->default(0);
            $table->float('holidays_balance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_records');
    }
};
