<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipependidikan extends Model
{
    use HasFactory;
    protected $table = 'tipependidikan';
    protected $fillable = ['kode', 'tipependidikan'];
    
    public function SaranaPendidikan()
    {
        return $this->hasMany(Saranapendidikan::class);
    }
}
