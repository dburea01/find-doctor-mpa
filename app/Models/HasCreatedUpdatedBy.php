<?php
namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

trait HasCreatedUpdatedBy
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function bootHasCreatedUpdatedBy()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::check() ? Auth::user()->name : '?';
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::check() ? Auth::user()->name : '?';
        });
    }
}
