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
        Schema::table('user_project', function (Blueprint $table) {
            $table->renameColumn('projects_id', 'project_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_project', function (Blueprint $table) {
            $table->renameColumn('project_id', 'projects_id');
        });
    }
};
