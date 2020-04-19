<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    public $table = 'student_registers';

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
