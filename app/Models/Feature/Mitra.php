<?php

namespace App\Models\Feature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id','logo','slug','description','join_at','is_approved'];
    protected $appends = ['html_status','logo_path'];

    public function getHtmlStatusAttribute()
    {
        if($this->is_approved == '0'){
            return '<span class="badge bg-warning">'.__('status.mitra_pending').'</span>';
        }

        return '<span class="badge bg-success">'.__('status.mitra_approved').'</span>';
    }

    public function getLogoPathAttribute()
    {
        return asset('storage/' . $this->logo);
    }
}
