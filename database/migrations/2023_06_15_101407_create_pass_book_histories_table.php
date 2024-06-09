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
        Schema::create('ls_sotietkiem', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sotietkiem_id')->unsigned();
            $table->string('loaigd')->comment('loai hinh giao dich')->checkIn(['deposit', 'withdraw', 'interest']);
            $table->float('sotien', 30, 5)->default(0);
            $table->float('soducu', 30, 5)->default(0);
            $table->float('sodumoi', 30,5)->default(0);
            $table->datetime('ngaygiaodich')->nullable();
            $table->string('ghichu')->nullable();
            $table->foreign('sotietkiem_id')->references('id')->on('sotietkiem');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ls_sotietkiem');
    }
};
