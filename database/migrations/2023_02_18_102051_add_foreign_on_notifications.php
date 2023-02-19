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
        //
        Schema::table('notifications', function (Blueprint $table) {
            $table->foreign('from_id')->references('id')->on('users')->onDelete('NO ACTION');
            $table->foreign('to_id')->references('id')->on('users')->onDelete('NO ACTION');
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
