<?php

namespace App\Model\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;
use Mail;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class User extends Authenticatable implements HasMedia
{
    use SoftDeletes, Notifiable, InteractsWithMedia;

    protected $fillable = ['name', 'email', 'password', 'remember_token', 'role_id', 'academic_year_id', 'course_semester_id', 'student_register_id', 'student_roll_id'];

    public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }


    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id')->withTrashed();
    }
    public function semester()
    {
        return $this->belongsTo(CourseSemester::class, 'course_semester_id');
    }
    public function register()
    {
        return $this->belongsTo(StudentRegister::class, 'student_register_id');
    }
    public function roll()
    {
        return $this->belongsTo(StudentRegister::class, 'student_roll_id');
    }
    public function year()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
    public function isAdmin()
    {
        foreach ($this->role()->get() as $role) {
            if ($role->id == 1) {
                return true;
            }
        }

        return false;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
        ->width(368)
        ->height(232);
    }
    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
}
