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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('cmnd_cccd')->unique();
            $table->string('phone')->unique();
            $table->string('address')->default('bank master');
            $table->date('birthday')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('12345678');
            $table->bigInteger('role_id')->unsigned()->default(3);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('avatar')->default('https://avatarfiles.alphacoders.com/119/119959.jpg');
            $table->string('api_token', 80)
                ->unique()
                ->nullable()
                ->default(null);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
