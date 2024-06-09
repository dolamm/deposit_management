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
            $table->float('laisuat',8,4);
            $table->boolean('giahan')->default(false)->comment('gia han khi den ngay dao han');
            $table->integer('thoigiannhanlai')->unsigned()->comment('don vi tinh la ngay');
            $table->datetime('ngaytao')->nullable();
            $table->datetime('ngaycapnhat')->nullable();
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
