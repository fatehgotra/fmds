<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicationDocs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'application_id',
        'doc',
        'file',
        'type'
    ];

    public static function booted() {
        static::creating(function ($model) {
            $model->uuid = bin2hex(random_bytes(5));
        });
    }
}
