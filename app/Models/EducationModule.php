<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Localizable;
use App\Traits\Sortable;

class EducationModule extends Model
{
    use Localizable, Sortable;

    protected $guarded = [];
}
