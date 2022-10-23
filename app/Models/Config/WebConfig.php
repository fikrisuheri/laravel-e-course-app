<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebConfig extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['name','label','value','type'];
    protected $appends = ['file_path'];
    public function getFilePathAttribute()
    {
        if ($this->type == 2) {
            if ($this->value != null) {
                return asset('storage/' . $this->value);
            } else {
                return asset('default/null/notfound.png');
            }
        }
    }    
}
