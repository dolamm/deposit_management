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
        Schema::create('bc_doanhso', function (Blueprint $table) {
            $table->id();
            $table->string('makyhan');
            $table->float('tongchi',25,3)->default(0);
            $table->float('tongthu',25,3)->default(0);
            $table->float('chenhlech',25,3)->nullable();
            $table->datetime('ngaytao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bc_doanhso');
    }
};
