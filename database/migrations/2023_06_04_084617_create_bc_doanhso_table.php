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
            $table->float('tongchi');
            $table->float('tongthu');
            $table->float('chenhlech');
            $table->timestamps();
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
