<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->unsignedDouble('purchase_price');
            $table->longText('description');
            $table->timestamps();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('author_id')->constrained('authors');
            $table->foreignId('edition_id')->constrained('editions');
            $table->foreignId('genre_id')->constrained('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
