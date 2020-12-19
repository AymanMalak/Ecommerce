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

            $table->string('name',100);
            $table->float('price',8,2);
            $table->integer('quantity')->nullable();
            $table->text('description');
            $table->string('img')->nullable();
            $table->enum('status',['1','0'])->nullable();

            // $table->foreignId('category_id')->constrained('categories');
            $table->unsignedBigInteger('category_id');
            // $table->foreignId('category_id')->constrained('categories');

            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreignId('category_id')->constrained('categories');
            $table->foreign('category_id')->references('id')->on('categories');

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
