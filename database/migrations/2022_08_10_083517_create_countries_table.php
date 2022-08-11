<?php

use App\Models\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->string('id', 2)->primary();
            $table->json('name');
            $table->string('icon')->nullable();
            $table->string('is_active')->default('true');
            $table->tinyInteger('position');
            $table->timestamps();
        });

        $countries = [
            [
                'id' => 'FR',
                'name' => [
                    'fr' => 'France',
                    'en' => 'France',
                ],
                'icon' => 'flag_FR.png',
                'position' => 10,
            ],
            [
                'id' => 'IT',
                'name' => [
                    'fr' => 'Italie',
                    'en' => 'Italy',
                ],
                'icon' => 'flag_IT.png',
                'position' => 20,
            ],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
