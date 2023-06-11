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
        Schema::create('kyhan', function (Blueprint $table) {
            $table->id();
            $table->string('makyhan')->unique();
            $table->string('tenkyhan');
            $table->float('laisuat',6,3);
            $table->integer('thoigiannhanlai')->unsigned()->comment('don vi tinh la ngay');
            $table->datetime('ngaytao');
            $table->datetime('ngaycapnhat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyhan');
    }
};
