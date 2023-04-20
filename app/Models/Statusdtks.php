<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statusdtks extends Model
{
    use HasFactory;
    protected $table = 'statusdtks';
    protected $fillable = [
        'id',
        'kode',
        'statusdtks',
    ];

    public function siks()
    {
        return $this->belongsTo(Siks::class);
    }
    public function pkh()
    {
        return $this->belongsTo(Pkh::class);
    }
}
