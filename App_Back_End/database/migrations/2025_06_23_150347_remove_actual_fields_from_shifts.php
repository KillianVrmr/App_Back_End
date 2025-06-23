<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('shifts', function (Blueprint $table) {
            $table->dropColumn([
                'actual_start',
                'actual_end',
                'actual_break',
                'notes',
                'submitted_at',
                'approved_at',
            ]);
        });
    }

    public function down()
    {
        Schema::table('shifts', function (Blueprint $table) {
            $table->datetime('actual_start')->nullable();
            $table->datetime('actual_end')->nullable();
            $table->integer('actual_break')->nullable();
            $table->text('notes')->nullable();
            $table->datetime('submitted_at')->nullable();
            $table->datetime('approved_at')->nullable();
        });
    }
};

