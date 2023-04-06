<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class kelbekasi extends Model
{
    use HasFactory;

    protected $table = 'kelbekasi';

    protected $hidden = [
        'district_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
