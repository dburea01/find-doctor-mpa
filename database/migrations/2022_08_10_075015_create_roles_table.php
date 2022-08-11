<?php

use App\Models\Role;
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
        Schema::create('roles', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->json('name');
            $table->boolean('is_active')->default('true');
            $table->tinyInteger('position');
            $table->timestamps();
        });

        $roles = [
            [
                'id' => 'ADMIN',
                'name' => [
                    'en' => 'Administrator',
                    'fr' => 'Administrateur',
                ],
                'position' => 10,
            ],
            [
                'id' => 'PRACTI',
                'name' => [
                    'en' => 'Practitioner',
                    'fr' => 'Praticien',
                ],
                'position' => 20,
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
