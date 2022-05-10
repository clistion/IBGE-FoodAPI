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
        Schema::create('food_nutrients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foods_id');
            $table->foreignId('nutrients_id');
            $table->float('amount')->default('0.00');
            $table->timestamps();


            $table->foreign('foods_id')->references('id')->on('foods')->onDelete('NO ACTION')->onUpdate('CASCADE');
            $table->foreign('nutrients_id')->references('id')->on('nutrients')->onDelete('NO ACTION')->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods_nutrients');
    }
};
