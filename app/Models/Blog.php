<?php

namespace App\Models;

use App\Enums\BlogSource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $casts = [
        'source' => BlogSource::class
    ];
}
