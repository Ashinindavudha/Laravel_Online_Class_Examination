<?php

namespace App\Model\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = ['question_text', 'answer_explanation', 'more_info_link', 'subject_id'];

    const CORRECT_SELECT = [
        'option1' => 'Option #1',
        'option2' => 'Option #2',
        'option3' => 'Option #3',
        'option4' => 'Option #4',
        'option5' => 'Option #5',
    ];

    public static function boot()
    {
        parent::boot();

        Question::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSubjectIdAttribute($input)
    {
        $this->attributes['subject_id'] = $input ? $input : null;
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id')->withTrashed();
    }

    public function options()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id')->withTrashed();
    }
}
