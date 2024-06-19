<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Olahraga Yang Direkomendasikan</title>
</head>
<body>
    <h1>Detail Olahraga Yang Direkomendasikan</h1>
    <div>
    @isset($sport)
    <p>Nama Olahraga: {{ $sport->sport }}</p>
    @isset($sport->deskripsi) 
        <p>Deskripsi: {{ $sport->deskripsi }}</p> <
    @else
        <p>Deskripsi tidak tersedia.</p>
    @endisset
   
@else
    <p>Tidak ada Olahraga yang direkomendasikan untuk kategori IMT Anda.</p>
@endisset

    </div>
</body>
</html>
