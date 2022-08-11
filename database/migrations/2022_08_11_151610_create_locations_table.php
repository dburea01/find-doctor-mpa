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
        Schema::create('locations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('location_type_id');
            $table->integer('city_id');
            $table->string('name');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by')->nullable();

            $table->foreign('location_type_id')->references('id')->on('location_types')->nullOnDelete();
            $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
