<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('maincategoryid');
          $table->integer('subcategoryid');
          $table->integer('sellerid');
          $table->string('productname');
          $table->string('sellername');
          $table->integer('expsellprice');
          $table->string('contactmethod');
          $table->string('description');
          $table->string('location');
          $table->text('photos');
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
        Schema::dropIfExists('advertisements');
    }
}
