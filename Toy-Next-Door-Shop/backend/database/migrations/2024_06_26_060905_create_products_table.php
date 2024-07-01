<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->text('description')->nullable();
            $table->timestamps(); // Adds `created_at` and `updated_at` columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}