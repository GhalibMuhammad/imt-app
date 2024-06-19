<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung IMT</title>
</head>
<body>
    <div class="container">
        <h1>Hitung IMT</h1>
        <form method="POST" action="{{ route('index') }}">
            @csrf   

            <div>
                <label for="nis">NIS:</label>
                <input type="text" name="nis" id="nis" required autofocus>
                @error('nis')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="tb">Tinggi Badan (cm):</label>
                <input type="text" name="tb" id="tb" placeholder="Tinggi Badan (cm)" required>
            </div>
            <div>
                <label for="bb">Berat Badan (kg):</label>
                <input type="text" name="bb" id="bb" placeholder="Berat Badan (kg)" required>
            </div>
            <div>
                <label for="jk">Jenis Kelamin:</label>
                <select name="jk" id="jk" required>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
            </div>
            <button type="submit">Hitung IMT</button>                

            @isset($imt)
                <div class="result">
                    <h2>Hasil Perhitungan IMT</h2>
                    <p>Nama : {{ $nama }}</p>
                    <p>Berat Badan : {{ $bb }} </p>
                    <p>Tinggi Badan : {{ $tb }}</p>
                    <p>Kategori IMT Anda: {{ $category }}</p>
                    <p>IMT Anda: {{ $imt }}</p>

                    <div>
                        @if(session('imt_id'))
                            <a href="{{ route('recommendedFood') }}" class="btn btn-primary">Lihat Makanan Direkomendasikan</a>
                    @endif
                    <div>
                        @if(session('imt_id'))
                            <a href="{{ route('recommendedSport') }}" class="btn btn-primary">Lihat Olahraga Direkomendasikan</a>
                    @endif
                    </div>
                </div>
            @endisset
        </form>
    </div>
</body>
</html>
