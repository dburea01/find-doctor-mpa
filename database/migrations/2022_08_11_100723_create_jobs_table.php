<?php

use App\Models\Job;
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default('true');
            $table->tinyInteger('position');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
        });

        $jobs = [
            [
                'name' => [
                    'en' => 'Doctor',
                    'fr' => 'Médecin',
                ],
                'position' => 10,
            ],
            [
                'name' => [
                    'en' => 'Dental Surgeon',
                    'fr' => 'Chirurgien-Dentiste',
                ],
                'position' => 20,
            ],
            [
                'name' => [
                    'en' => 'Pharmacist',
                    'fr' => 'Pharmacien',
                ],
                'position' => 30,
            ],
            [
                'name' => [
                    'en' => 'Midwife',
                    'fr' => 'Sage-femme',
                ],
                'position' => 40,
            ],
            [
                'name' => [
                    'en' => 'Surgeon',
                    'fr' => 'Chirurgien',
                ],
                'position' => 50,
            ],
            [
                'name' => [
                    'en' => 'Gynaecologist',
                    'fr' => 'Gynécologue',
                ],
                'position' => 60,
            ],
            [
                'name' => [
                    'en' => 'Cardiologist',
                    'fr' => 'Cardiologue',
                ],
                'position' => 70,
            ],
            [
                'name' => [
                    'en' => 'Psychiatrist',
                    'fr' => 'Psychiatre',
                ],
                'position' => 80,
            ],
            [
                'name' => [
                    'en' => 'Pediatrician',
                    'fr' => 'Pédiatre',
                ],
                'position' => 90,
            ],
            [
                'name' => [
                    'en' => 'Dermatologist',
                    'fr' => 'Dermatologue',
                ],
                'position' => 100,
            ],
            [
                'name' => [
                    'en' => 'Ophthalmologist',
                    'fr' => 'Ophtalmologue',
                ],
                'position' => 110,
            ]
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
