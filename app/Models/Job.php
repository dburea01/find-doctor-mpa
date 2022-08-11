<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Job extends Model
{
    use HasTranslations, HasCreatedUpdatedBy;

    public $translatable = ['name', 'description'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $fillable = [
        'id',
        'name',
        'description',
        'is_active',
        'position',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => ucwords($value),
        );
    }
}
