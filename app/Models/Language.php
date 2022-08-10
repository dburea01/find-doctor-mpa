<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Language extends Model
{
    use HasTranslations;

    public $incrementing = false;

    // tell Eloquent that key is a string, not an integer
    protected $keyType = 'string';

    public $translatable = ['name'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $fillable = [
        'id',
        'name',
        'is_active',
        'position'
    ];
}
