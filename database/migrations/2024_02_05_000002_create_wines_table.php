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
        Schema::create('wines', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('code_saq')->nullable();
            $table->string('country', 100)->nullable();
            $table->string('size', 45)->nullable();
            $table->string('type', 45)->nullable();
            $table->string('photo', 255)->default('/storage/img/wine.png');
            $table->float('price', 8, 2)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wines');
    }
};
