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
        Schema::create('ls_kyhan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kyhan_id')->unsigned();
            $table->float('laisuatcu');
            $table->float('laisuatmoi');
            $table->timestamps();
            $table->foreign('kyhan_id')->references('id')->on('kyhan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ls_kyhan');
    }
};
