<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoFactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_facts', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('description');
            $table->string('address');
            $table->unsignedBigInteger('entity_type_id');

            $table->foreign('entity_type_id')->references('id')->on('entity_types')->onDelete('cascade');

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
        Schema::dropIfExists('photo_facts');
    }
}
