<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class AdvanceSalary extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class, 'emp_id');
    }
}
