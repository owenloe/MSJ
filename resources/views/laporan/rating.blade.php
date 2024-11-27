<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rating</title>
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
        th {
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
        }
        th:nth-child(odd) {
            background-color: #45a049; /* Slightly darker green for odd columns */
        }
        th:nth-child(even) {
            background-color: #4CAF50; /* Green background for even columns */
        }
    </style>
</head>
<body>
    <h2>Laporan Rating</h2>
    <table>
        <thead>
            <tr>
                <th>ID Rating</th>
                <th>User ID</th>
                <th>Nama User</th>
                <th>Rating</th>
                <th>Komentar</th>
                <th>Gambar Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $ratings)
                <tr>
                    <td>{{ $ratings->id_rating }}</td>
                    <td>{{ $ratings->userid }}</td>
                    <td>{{ $ratings->nama_user }}</td>
                    <td>{{ $ratings->rating }}</td>
                    <td>{{ $ratings->komentar }}</td>
                    <td>{{ $ratings->gambar_produk}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>