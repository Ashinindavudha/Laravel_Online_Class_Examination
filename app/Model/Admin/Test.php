<?php

namespace App\Model\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'result'];

    public static function boot()
    {
        parent::boot();

        Test::observe(new \App\Observers\UserActionsObserver);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
