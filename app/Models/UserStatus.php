<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class UserStatus extends Model
{
    use HasTranslations;

    public $table = 'user_statuses';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'comment',
        'position',
    ];

    public $translatable = [
        'name', 'comment'
    ];
}
