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
        Schema::create('applyvisas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('passport');
            $table->date('validity');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('visa_id');
            $table->unsignedBigInteger('profession_id');
            $table->date('travel_date');
            $table->date('dob');
            $table->foreign('country_id')->references('id')->on('country')->onDelete('cascade');
            $table->foreign('visa_id')->references('id')->on('visatype')->onDelete('cascade');
            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('cascade');
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
        Schema::dropIfExists('applyvisas');
    }
};
