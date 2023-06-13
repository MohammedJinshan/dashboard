<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function item_category()
    {
        return $this->belongsTo(ItemCategory::class);
    }
}
