<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongandarah extends Model
{
    use HasFactory;
    protected $table = 'golongandarah';
    protected $fillable = ['kode', 'golongandarah'];
    
    public function tkk()
    {
        return $this->hasMany(Tkk::class);
    }
    public function pns()
    {
        return $this->hasMany(Pns::class);
    }
    public function ktp()
    {
        return $this->hasMany(Ktp::class);
    }
}
