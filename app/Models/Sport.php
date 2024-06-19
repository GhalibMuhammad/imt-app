<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $table = 'sports'; // Menentukan nama tabel yang akan digunakan

    protected $fillable = [
        'imt_category',
        'sport',
        'deskripsi',
    ];

    public function imt()
    {
        return $this->hasOne(Imt::class);
    }
}
