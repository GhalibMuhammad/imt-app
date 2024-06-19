<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Imt Model
class Imt extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'food_id',
        'sport_id',
        'tb',
        'bb',
        'jk',
        'imt_category',
        'imt_results',
    ];

    public function siswas()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function foods()
    {
        return $this->belongsTo(Food::class); 
    }

    public function sports()
    {
        return $this->belongsTo(Sport::class); // Jika diperlukan
    }
}


