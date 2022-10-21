<?php

namespace App\Models\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $appends =[
        'progress_percent'
    ];

    public function Course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getProgressPercentAttribute()
    {
        $progress = $this->progress / $this->course->total_item * 100;
        return number_format($progress);
    }
}
