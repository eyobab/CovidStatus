<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
          $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('condition', 1000);
            $table->boolean('cough');
            $table->boolean('fever');
            $table->boolean('wet_nose');
            $table->boolean('nearby_confirmed');
            $table->boolean('nearby_suspect');
            $table->boolean('need_help');
            $table->string('help_description', 1000);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('statuses');
    }
}
