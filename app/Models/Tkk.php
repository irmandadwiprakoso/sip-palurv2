<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tkk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tkk';
    protected $fillable =
    [
        'id', 'nama', 'KK', 'tempat_lahir', 'tanggal_lahir', 'jeniskelamin_id',
        'alamat', 'agama_id', 'pendidikan_id', 'statuskawin_id', 'seksi_id', 'jabatan_id',
        'district_id', 'village_id',
        'SK_Tkk', 'no_rek', 'npwp', 'email', 'no_HP', 'foto', 'user_id', 'username', 'rw_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['foto' => 'default.jpg']);
    }

    public function getFoto()
    {
        if (!$this->foto) {
            return asset('images/TKK/default.jpg');
        }
        return asset('images/TKK/' . $this->foto);
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function jeniskelamin()
    {
        return $this->belongsTo(Jeniskelamin::class);
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }
    public function statuskawin()
    {
        return $this->belongsTo(Statuskawin::class);
    }
    public function seksi()
    {
        return $this->belongsTo(Seksi::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class);
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
    public function kecbekasi()
    {
        return $this->belongsTo(kecbekasi::class);
    }
}
