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
        Schema::create('account_histories', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');
            //type deposit or withdraw == add or sub
            $table->string('type', 255);
            $table->float('old_balance', 30, 5)->nullable();
            $table->float('new_balance', 30, 5)->nullable();
            $table->float('amount', 30, 5)->default(0);
            $table->string('description', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_histories');
    }
};
