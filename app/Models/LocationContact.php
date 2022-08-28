<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocationContact extends Model
{
    use HasFactory;

    public function mean_contacts():BelongsTo
    {
        return $this->belongsTo(MeanContact::class);
    }
}
