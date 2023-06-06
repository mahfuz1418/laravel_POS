<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'sup_id');
    }

}
