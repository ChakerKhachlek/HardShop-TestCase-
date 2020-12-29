<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("label")->nullable();
            $table->TEXT("description", 255)->nullable();
            $table->string('quantity');
            $table->float('price');
            $table->string('image')->nullable();
            $table->boolean('isCustumizble')->nullable();

            $table->foreignId('sub_category_id')
            ->constrained('sub_categories')
            ->onUpdate('cascade')
            ->onDelete('cascade');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
