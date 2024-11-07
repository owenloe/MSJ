<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h2>Laporan Pengguna</h2>
    <table>
        <thead>
            <tr>
                <th>id_produk</th>
                <th>nama_produk</th>
                <th>kategori_produk</th>
                <th>quantity_produk</th>
                <th>harga_produk</th>
                <th>berat</th>
                <th>jenis</th>
                <th>ukuran</th>
                <th>warna</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $pengguna)
                <tr>
        <th>userid</th>
  <th>nama</th>
  <th>email</th>
  <th>password</th>
  <th>jalan</th>
  <th>kota</th>
  <th>kecamatan</th>
  <th>nomor_telepon</th>
  <th>is_admin</th>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>