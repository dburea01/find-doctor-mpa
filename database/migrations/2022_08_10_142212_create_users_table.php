<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('role_id', 10);
            $table->string('civility_id', 10)->nullable();
            $table->string('user_status_id', 10);
            $table->string('local_id')->unique();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by')->nullable();

            $table->foreign('role_id')->references('id')->on('roles')->nullOnDelete();
            $table->foreign('civility_id')->references('id')->on('civilities')->nullOnDelete();
            $table->foreign('user_status_id')->references('id')->on('user_statuses')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
