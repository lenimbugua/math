<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('academic_level');
            $table->string('paper_type');
            $table->text('title');
            $table->string('number_of_pages');
            $table->string('cost');
            $table->text('amount_paid');
            $table->integer('progress');
            $table->string('deadline');
            $table->text('instructions');
            $table->string('paper_format');
            $table->integer('user_id');
            $table->integer('number_of_sources'); 
            $table->boolean('approved');            
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
        Schema::dropIfExists('orders');
    }
}
