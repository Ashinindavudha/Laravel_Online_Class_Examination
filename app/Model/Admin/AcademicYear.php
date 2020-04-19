<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    public $table = 'academic_years';

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
