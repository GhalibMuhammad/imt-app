<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Makanan Direkomendasikan</title>
</head>
<body>
    <h1>Detail Makanan Direkomendasikan</h1>
    <div>
    @isset($food)
    <p>Nama Makanan: {{ $food->food }}</p>
    @isset($food->deskripsi) 
        <p>Deskripsi: {{ $food->deskripsi }}</p> <
    @else
        <p>Deskripsi tidak tersedia.</p>
    @endisset
   
@else
    <p>Tidak ada makanan yang direkomendasikan untuk kategori IMT Anda.</p>
@endisset

    </div>
</body>
</html>
