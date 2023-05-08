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
    {   # create_products_table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer('price')->nullable();
            $table->boolean('instock')->default(false);
            $table->string('image')->nullable();
            $table->timestamps();  # --> time stamp ---> create, update process on the records on the table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
