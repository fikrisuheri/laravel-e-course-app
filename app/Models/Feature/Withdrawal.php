<?php

namespace App\Models\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $appends = ['html_status'];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    // Appends

    public function getHtmlStatusAttribute()
    {
        if($this->status == 0){
            $status = '<span class="badge bg-warning">'.__('status.withdraw_pending').'</span>';
        }else{
            $status = '<span class="badge bg-success">'.__('status.withdraw_success').'</span>';
        }
        return $status;
    }
}
