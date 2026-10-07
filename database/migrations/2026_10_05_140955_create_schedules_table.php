<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->dateTime('scheduled_at');
            $table->string('timezone')->default('Asia/Jakarta');
            $table->foreignId('issue_id')->constrained('issues')->cascadeOnDelete();
            $table->enum('frequency', ['daily', 'weekly', 'monthly', 'yearly'])->nullable();
            $table->integer('interval')->default(1);
            $table->boolean('is_recurring')->default(false);
            $table->dateTime('recurrence_end_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
