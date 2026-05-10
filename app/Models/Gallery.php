<?php

namespace App\Models;

use App\Traits\Localizable;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory, Localizable, Sortable;

    protected $guarded = [];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image_path ? asset('media/' . $this->image_path) : null;
    }
}
