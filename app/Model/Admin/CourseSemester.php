<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class CourseSemester extends Model
{
    public $table = 'course_semesters';

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
