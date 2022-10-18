<?php

namespace App\Models\Feature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['total_duration','total_video','mitra_name','type_name'];
    
    // Relation
    public function Detail()
    {
        return $this->hasMany(CourseDetail::class);
    }

    public function Mitra()
    {
        return $this->belongsTo(Mitra::class,'mitra_id');
    }

    // Appends
    public function getTotalDurationAttribute()
    {
        $menit =  $this->Detail()->sum('duration');
        $jam = $menit / 60;
        return $jam . ' Jam';
    }

    public function getTotalVideoAttribute()
    {
        $total =  $this->Detail()->count();
        return $total . ' Jam';
    }

    public function getMitraNameAttribute()
    {
        return $this->mitra->user->name;
    }

    public function getTypeNameAttribute()
    {
        if($this->type == 0){
            return '<span class="badge bg-success">Gratis</span>';
        }else{
            return '<span class="badge bg-primary">Berbayar</span>';
        }
    }
}
