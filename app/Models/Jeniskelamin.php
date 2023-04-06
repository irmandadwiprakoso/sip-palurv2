<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeniskelamin extends Model
{
    use HasFactory;
    protected $table = 'jeniskelamin';
    protected $fillable = ['kode', 'jeniskelamin'];
    
    public function tkk()
    {
        return $this->hasMany(Tkk::class);
    }
    public function asn()
    {
        return $this->hasMany(Asn::class);
    }
    public function ktp()
    {
        return $this->hasMany(Ktp::class);
    }
}
