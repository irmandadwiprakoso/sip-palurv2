<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    use HasFactory;
    protected $table = 'kependudukan';
    protected $fillable = [
        'rt_id',
        'rw_id',
        'KK',
        'Laki_laki',
        'Perempuan',
    ];
    
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
