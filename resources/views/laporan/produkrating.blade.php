<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rating Produk</title>
</head>
<body>
    <h1>Laporan Rating Produk</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Nama Produk</th>
                <th>Rating</th>
                <th>Komentar</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($ratings as $rating)
            <tr>
                <td>{{ $rating->pengguna->nama }}</td> 
                <td>{{ $rating->produk->nama_produk }}</td> 
                <td>{{ $rating->rating }}</td>
                <td>{{ $rating->komentar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>