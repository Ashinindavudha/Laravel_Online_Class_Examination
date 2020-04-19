<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class StudentRoll extends Model
{
    public $table = 'student_rolls';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
