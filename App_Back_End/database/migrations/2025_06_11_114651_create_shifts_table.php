<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('project_id')->constrained()->onDelete('cascade');

            $table->date('shift_date');
            $table->dateTime('planned_start');
            $table->dateTime('planned_end');
            $table->integer('planned_break')->default(30); // in minuten

            $table->dateTime('actual_start')->nullable();
            $table->dateTime('actual_end')->nullable();
            $table->integer('actual_break')->nullable(); // in minuten

            $table->text('notes')->nullable();
            $table->timestamp('submitted_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};

