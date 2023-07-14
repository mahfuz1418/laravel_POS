<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];
    
    public function advance(): HasOne
    {
        return $this->hasOne(AdvanceSalary::class, 'emp_id');
    }

    public function salary_data(): HasOne
    {
        return $this->hasOne(Salary::class, 'emp_id');
    }


}
