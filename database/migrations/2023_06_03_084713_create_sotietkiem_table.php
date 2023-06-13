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
        Schema::create('sotietkiem', function (Blueprint $table) {
            $table->id();
            $table->json('loaikyhan')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->timestamps();
            $table->datetime('ngaymoso');
            $table->datetime('ngaydaohan')->nullable();
            $table->float('sotiengui');
            $table->float('sodu')->nullable();
            $table->float('tienlai')->default(0);
            $table->datetime('ngaydongso')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sotietkiem');
    }
};
