<?php

namespace App\Models\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['course_name','html_status','buyer_name'];
    // Relation
    public function Course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getCourseNameAttribute()
    {
        return $this->Course->name;
    }

    public function getHtmlStatusAttribute()
    {
        if($this->status == '0'){
            return '<span class="badge bg-warning">'.__('status.transaction_pending').'</span>';
        }elseif($this->status == '1'){
            return '<span class="badge bg-success">'.__('status.transaction_success').'</span>';
        }else{
            return '<span class="badge bg-success">'.__('status.transaction_expired').'</span>';
        }
    }

    public function getBuyerNameAttribute()
    {
        return $this->user->name;
    }
}
