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
        Schema::create('buy_lists', function (Blueprint $table) {
            $table->primary(['cellar_id', 'wine_id']);
            $table->unsignedBigInteger('cellar_id');
            $table->unsignedBigInteger('wine_id');
            $table->integer('quantity');
            $table->foreign(['cellar_id', 'wine_id'])->references(['cellar_id', 'wine_id'])->on('cellar_has_wines')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_lists');
    }
};
