<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'nis',
        'user_id',
        'name', 
        'email', 
        'rayon', 
        'nama_rombel',
    ];

    public function imts()
    {
        return $this->hasOne(Imt::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function findForPassport($nis)
    {
        return $this->where('nis', $nis)->first();
    }
}
