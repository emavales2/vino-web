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
        Schema::create('cellar_has_wines', function (Blueprint $table) {
            $table->primary(['cellar_id', 'wine_id']);
            $table->unsignedBigInteger('cellar_id');
            $table->unsignedBigInteger('wine_id');
            $table->integer('quantity');
            $table->foreign('cellar_id')->references('id')->on('cellars')->onDelete('cascade');
            $table->foreign('wine_id')->references('id')->on('wines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cellar_has_wines');
    }
};
