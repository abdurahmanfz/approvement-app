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
        Schema::table('approvements', function (Blueprint $table) {
            // $table->uuid('task_id');
            // $table->uuid('approved_by_id');

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('NO ACTION');
            $table->foreign('approved_by_id')->references('id')->on('users')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
