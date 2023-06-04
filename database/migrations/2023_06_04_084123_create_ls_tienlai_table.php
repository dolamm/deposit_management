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
        Schema::create('ls_tienlai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sotietkiem_id')->unsigned();
            $table->float('soducu');
            $table->integer('tienlai');
            $table->float('sodumoi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ls_tienlai');
    }
};
