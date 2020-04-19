<?php

namespace App\Model\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
     use SoftDeletes;

    protected $fillable = ['user_id', 'test_id', 'question_id', 'option_id', 'correct'];

    public static function boot()
    {
        parent::boot();

        TestAnswer::observe(new \App\Observers\UserActionsObserver);
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
