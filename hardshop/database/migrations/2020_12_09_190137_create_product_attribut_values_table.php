<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribut_values', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            
            $table->foreignId('product_id')
            ->constrained('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('product_attribut_id')
            ->constrained('productattributs')
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
        Schema::dropIfExists('product_attribut_values');
    }
}
