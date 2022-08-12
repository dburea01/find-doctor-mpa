<?php

use App\Models\MeanContact;
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
        Schema::create('mean_contacts', function (Blueprint $table) {
            $table->string('id', 10);
            $table->json('name');
            $table->boolean('is_active')->default('true');
            $table->tinyInteger('position');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
        });

        $meanContacts = [
            [
                'id' => 'PHONE',
                'name' => [
                    'en' => 'Phone',
                    'fr' => 'Téléphone',
                ],
                'position' => 10,
            ],
            [
                'id' => 'EMAIL',
                'name' => [
                    'en' => 'Email',
                    'fr' => 'Mel',
                ],
                'position' => 20,
            ],
        ];

        foreach ($meanContacts as $meanContact) {
            MeanContact::create($meanContact);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mean_contacts');
    }
};
