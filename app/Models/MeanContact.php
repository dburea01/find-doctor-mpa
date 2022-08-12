<?php
namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class MeanContact extends Model
{
    use HasTranslations, HasCreatedUpdatedBy;

    public $incrementing = false;

    // tell Eloquent that key is a string, not an integer
    protected $keyType = 'string';

    public $translatable = ['name'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $fillable = [
        'id',
        'name',
        'is_active',
        'position',
    ];
}
