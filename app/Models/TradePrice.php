<?php

namespace App\Models;

use App\Traits\Localizable;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradePrice extends Model
{
    use HasFactory, Localizable, Sortable;

    protected $guarded = [];
}
