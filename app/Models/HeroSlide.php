<?php

namespace App\Models;

use App\Traits\Localizable;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    use Localizable, Sortable;

    protected $guarded = [];
}
