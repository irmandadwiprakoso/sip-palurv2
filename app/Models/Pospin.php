<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pospin extends Model
{
    use HasFactory;
    protected $table = 'pospin';
    protected $fillable = [
        'id',
        'ktp_id',
        'saranakesehatan_id',
        'nama_ortu',
        'rw_id',
        'district_id',
        'village_id',
        'pin_1',
        'pin_2',
    ];

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function ktp()
    {
        return $this->belongsTo(Ktp::class);
    }
    public function saranakesehatan()
    {
        return $this->belongsTo(Saranakesehatan::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
    public function kelbekasi()
    {
        return $this->belongsTo(kelbekasi::class);
    }
}
