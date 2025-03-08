<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class url extends Model
{
    use HasFactory;

    // protected $table = 'linkshortener';

    protected $fillable = ['url', 'url_id']; // Example fillable fields

    protected static function boot()
    {
        parent::boot();

        // Set default values for created_at and updated_at
        static::creating(function ($model) {
            $model->created_at = now(); // Set current timestamp when creating
        });

        static::updating(function ($model) {
            $model->updated_at = now(); // Set current timestamp when updating
        });
    }
}
