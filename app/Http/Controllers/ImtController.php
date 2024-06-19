<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Imt;
use App\Models\Siswa;
use App\Models\Food;
use App\Models\Sport;

class ImtController extends Controller
{ 
    public function index()
    {
        return view('siswa.index');
    }

    public function calculateImt(Request $request)
{
    $request->validate([
        'nis' => 'required|exists:siswas,nis',
        'tb' => 'required|numeric', 
        'bb' => 'required|numeric',
        'jk' => 'required',
    ]);

    $siswa = Siswa::where('nis', $request->nis)->first();

    $tinggiBadan = $request->tb / 100; 
    $beratBadan = $request->bb;
    $imt = $beratBadan / ($tinggiBadan * $tinggiBadan);

    $imt = number_format($imt, 1);

    $imtCategory = $this->getImtCategory($imt, $request->jk);

    $imtRecord = new Imt([
        'siswa_id' => $siswa->id,
        'name' => $siswa->name,
        'tb' => $request->tb,
        'bb' => $request->bb,
        'jk' => $request->jk, 
        'imt_results' => $imt,
        'imt_category' => $imtCategory,
        'food_id' => $this->getFoodId($imtCategory),
        'sport_id' => $this->getSportId($imtCategory),
    ]);
    $imtRecord->save();

    Session::put('imt_id', $imtRecord->id);

    return view('siswa.index')->with([
        'nama' => $siswa->name,
        'imt' => $imt,
        'category' => $imtCategory,
        'tb' => $request->tb,
        'bb' => $request->bb,

        
    ]);
}


    protected function getImtCategory($imt, $jk)
{
    if ($imt < 17.0 && $jk == 'pria') {
        return 'Kekurangan Berat Badan Tingkat Berat Jenis Kelamin Pria';
    } elseif ($imt >= 17.0 && $imt < 18.5 && $jk == 'pria') {
        return 'Kekurangan Berat Badan Tingkat Ringan Jenis Kelamin Pria';
    } elseif ($imt >= 18.5 && $imt <= 25.0 && $jk == 'pria') {
        return 'Normal Jenis Kelamin Pria';
    } elseif ($imt > 25.0 && $imt <= 27.0 && $jk == 'pria') {
        return 'Kelebihan Berat Badan Tingkat Ringan Jenis Kelamin Pria';
    } elseif ($imt > 27.0 && $jk == 'pria') {
        return 'Kelebihan Berat Badan Tingkat Berat Jenis Kelamin Pria';
    } elseif ($imt < 17.0 && $jk == 'wanita') {
        return 'Kekurangan Berat Badan Tingkat Berat Jenis Kelamin Wanita';
    } elseif ($imt >= 17.0 && $imt < 18.5 && $jk == 'wanita') {
        return 'Kekurangan Berat Badan Tingkat Ringan Jenis Kelamin Wanita';
    } elseif ($imt >= 18.5 && $imt <= 25.0 && $jk == 'wanita') {
        return 'Normal Jenis Kelamin Wanita';
    } elseif ($imt > 25.0 && $imt <= 27.0 && $jk == 'wanita') {
        return 'Kelebihan Berat Badan Tingkat Ringan Jenis Kelamin Wanita';
    } else {
        return 'Kelebihan Berat Badan Tingkat Berat Jenis Kelamin Wanita';
    }
}


public function getFoodId($imtCategory)
{
    $food = Food::where('imt_category', $imtCategory)->first();
        
    return $food->id ?? null;
}


    public function showRecommendedFood()

    {
    $imt_id = Session::get('imt_id');
    $imtRecord = Imt::findOrFail($imt_id); // Ambil rekaman Imt berdasarkan imt_id dari session
    $food = Food::findOrFail($imtRecord->food_id); // Ambil data makanan berdasarkan food_id dari rekaman Imt
    return view('siswa.recommended_food', ['food' => $food]);
    }

    public function getSportId($imtCategory)
    {
        $sport = Sport::where('imt_category', $imtCategory)->first();

        return $sport->id ?? null;

    }

    public function showRecommendedSport()
    {
        $imt_id = Session::get('imt_id');
        $imtRecord = Imt::findOrFail($imt_id); // Ambil rekaman Imt berdasarkan imt_id dari session
        $sport = Sport::findOrFail($imtRecord->sport_id); // Ambil data olahraga berdasarkan sport_id dari rekaman Imt
        return view('siswa.recommended_sport', ['sport' => $sport]);
    }



    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show(imt $imt)
    {
        //
    }

    public function edit(imt $imt)
    {
        //
    }

    public function update(Request $request, imt $imt)
    {
        //
    }

    public function destroy(imt $imt)
    {
        //
    }
}