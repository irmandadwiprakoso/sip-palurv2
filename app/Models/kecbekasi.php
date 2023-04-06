<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regency;

class kecbekasi extends Model
{
    use HasFactory;
    protected $table = 'kecbekasi';
    protected $hidden = [
        'regency_id'
    ];

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }
}
