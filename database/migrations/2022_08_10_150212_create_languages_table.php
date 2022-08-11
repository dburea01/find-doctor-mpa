<?php

use App\Models\Language;
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
        Schema::create('languages', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->json('name');
            $table->boolean('is_active')->default('true');
            $table->tinyInteger('position');
            $table->timestamps();
        });

        $languages = [
            [
                'id' => 'fr',
                'name' => [
                    'en' => 'French',
                    'fr' => 'Français',
                ],
                'position' => 10,
            ],
            [
                'id' => 'en',
                'name' => [
                    'en' => 'English',
                    'fr' => 'Anglais',
                ],
                'position' => 20,
            ],
            [
                'id' => 'it',
                'name' => [
                    'en' => 'Italy',
                    'fr' => 'Italien',
                ],
                'position' => 30,
            ],
            [
                'id' => 'es',
                'name' => [
                    'en' => 'Spanish',
                    'fr' => 'Espagnol',
                ],
                'position' => 40,
            ],
            [
                'id' => 'de',
                'name' => [
                    'en' => 'German',
                    'fr' => 'Allemand',
                ],
                'position' => 50,
            ],
            [
                'id' => 'pt',
                'name' => [
                    'en' => 'Portugal',
                    'fr' => 'Portugais',
                ],
                'position' => 60,
            ],
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
};
