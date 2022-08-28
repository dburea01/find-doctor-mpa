<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory, HasUuid, HasCreatedUpdatedBy;

    public $incrementing = false;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'location_type_id',
        'name',
        'address1',
        'address2',
        'address3',
        'city_id',
        'comment',
        'web_site'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function location_contacts(): HasMany
    {
        return $this->hasMany(LocationContact::class);
    }
}
