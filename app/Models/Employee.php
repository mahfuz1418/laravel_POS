<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = ['name', 'email', 'phone', 'address', 'city', 'photo', 'nid_no', 'experience', 'salary', 'vacation'];
}
