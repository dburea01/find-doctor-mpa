<?php

use App\Models\LocationType;
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
        Schema::create('location_types', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->boolean('is_active')->default('true');
            $table->tinyInteger('position');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
        });

        $locationTypes = [
            [
                'name' => [
                    'en' => 'Medical office',
                    'fr' => 'Cabinet médical',
                ],
                'position' => 10,
            ],
            [
                'name' => [
                    'en' => 'Dental office',
                    'fr' => 'Cabinet dentaire',
                ],
                'position' => 20,
            ],
            [
                'name' => [
                    'en' => 'Paramedical office',
                    'fr' => 'Cabinet périmédical',
                ],
                'position' => 30,
            ],
            [
                'name' => [
                    'en' => 'Medical imaging office',
                    'fr' => 'Centre d\'imagerie médicale',
                ],
                'position' => 40,
            ],
            [
                'name' => [
                    'en' => 'Nursing office',
                    'fr' => 'Centre de soins infirmiers',
                ],
                'position' => 50,
            ],
            [
                'name' => [
                    'en' => 'Public hospital',
                    'fr' => 'Hôpital public',
                ],
                'position' => 60,
            ],
            [
                'name' => [
                    'en' => 'Clinic',
                    'fr' => 'Clinique',
                ],
                'position' => 70,
            ],
            [
                'name' => [
                    'en' => 'Public hospital',
                    'fr' => 'Hôpital public',
                ],
                'position' => 80,
            ], [
                'name' => [
                    'en' => 'Retirement home',
                    'fr' => 'Maison de retraite',
                ],
                'position' => 90,
            ],
            [
                'name' => [
                    'en' => 'Maternity hospital',
                    'fr' => 'Maternité',
                ],
                'position' => 100,
            ],
        ];

        foreach ($locationTypes as $locationType) {
            LocationType::create($locationType);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_types');
    }
};
