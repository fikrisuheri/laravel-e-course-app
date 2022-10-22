<?php

namespace App\Models\Feature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['balance_rupiah'];

    public function getBalanceRupiahAttribute()
    {
        return 'Rp ' . number_format($this->balance,0,'.');
    }
}
