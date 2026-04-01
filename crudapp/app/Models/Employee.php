<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- ADD THIS LINE
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory; // Now Laravel knows what this is!

    protected $fillable = [
        'full_name',
        'email',
        'position',
        'salary',
    ];
}