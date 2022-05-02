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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unsigned();
            $table->string('description', 100);
            $table->integer('preparation_code');
            // $table->foreignId('category_id');
            // $table->integer('measurement_code');


            $table->timestamps();

            $table->foreign('preparation_code')->references('code')->on('preparations')->onDelete('NO ACTION')->onUpdate('CASCADE');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('NO ACTION')->onUpdate('CASCADE');
            // $table->foreign('measurement_code')->references('code')->on('measurements')->onDelete('NO ACTION')->onUpdate('CASCADE');



            // $table->date('publicationDate');
            // $table->string('ingredients', 255);
            // $table->string('marketCountry', 100);
            // $table->float('servingSize')->unsigned();
            // $table->string('servingSizeUnit', 100);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
};
