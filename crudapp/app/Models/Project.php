<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'deadline',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
