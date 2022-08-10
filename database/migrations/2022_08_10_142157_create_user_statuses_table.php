<?php

use App\Models\UserStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->json('name');
            $table->json('comment')->nullable();
            $table->tinyInteger('position');
            $table->timestamps();
        });

        $userStatuses = [
            [
                'id' => 'CREATED',
                'name' => [
                    'fr' => 'Utilisateur créé',
                    'en' => 'User created',
                ],
                'comment' => [
                    'fr' => 'Utilisateur a été créé, mais ne peut pas se connecter.',
                    'en' => 'User has been created, but can not still login.'
                ],
                'position' => 10,
            ],
            [
                'id' => 'VALIDATED',
                'name' => [
                    'fr' => 'Utilisateur validé',
                    'en' => 'User validated',
                ],
                'comment' => [
                    'fr' => 'Utilisateur a été validé, peut se connecter.',
                    'en' => 'User has been created, can login.'
                ],
                'position' => 20,
            ],
            [
                'id' => 'SUSPENDED',
                'name' => [
                    'fr' => 'Utilisateur suspendu',
                    'en' => 'User hold',
                ],
                'comment' => [
                    'fr' => 'Utilisateur a été suspendu, ne peut plus se connecter.',
                    'en' => 'User has been holded, can not login anymore.'
                ],
                'position' => 30,
            ],
        ];

        foreach ($userStatuses as $status) {
            UserStatus::create($status);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_statuses');
    }
};
