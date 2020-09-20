<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->json('images')->nullable();
            $table->text('description');
            $table->unsignedInteger('seat');
            $table->unsignedInteger('door');
            $table->unsignedInteger('bagagge');
            $table->boolean('ac');
            $table->boolean('gear_shift');
            $table->boolean('karaoke');
            $table->boolean('tv');
            $table->boolean('smoking_area');
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
        Schema::dropIfExists('buses');
    }
}
