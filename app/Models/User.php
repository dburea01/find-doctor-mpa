<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasUuid, HasCreatedUpdatedBy, Notifiable;

    public $incrementing = false;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role_id',
        'civility_id',
        'local_id',
        'email',
        'password',
        'user_status_id',
        'is_contracted',
        'web_site',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => ucwords($value),
        );
    }

    protected function lastName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    public function civility(): BelongsTo
    {
        return $this->belongsTo(Civility::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'user_jobs');
    }

    public function locations(): BelongsToMany
    {
        return $this->belongsToMany(Location::class, 'user_locations');
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'user_languages');
    }

    public function getFullNameAttribute(): string
    {
        return $this->civility->short_name . ' ' . $this->last_name . ' ' . $this->first_name;
        // return $this->last_name . ' ' . $this->first_name;
    }
}
