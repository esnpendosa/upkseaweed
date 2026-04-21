<?php

namespace App\Models;

use App\Traits\Localizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Localizable;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
