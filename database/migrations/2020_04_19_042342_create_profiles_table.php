<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('first_name');
            $table->string('father_name');
            $table->string('gfather_name');
            $table->string('gender')->default('male');
            $table->date('dob');
            $table->string('directorate_name');
            $table->string('supervisor_name');
            $table->string('current_role');
            $table->string('region');
            $table->string('sub_city');
            $table->string('woreda');
            $table->string('house_number');
            $table->string('work_location');
            $table->enum('locations', ['field', 'home','Office']);
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
        Schema::dropIfExists('e_profiles');
    }
}
