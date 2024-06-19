<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods'; // Menentukan nama tabel yang akan digunakan

    protected $fillable = [
        'imt_category', 
        'food',
        'deskripsi',
    ];

    public function imt()
    {
        return $this->hasOne(Imt::class);
    }
}
