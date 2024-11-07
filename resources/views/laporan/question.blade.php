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
    <h2>Laporan Pertanyaan</h2>
    <table>
        <thead>
            <tr>
                <th>id_tanya</th>
                <th>id_produk</th>
                <th>userid</th>
                <th>nama_user</th>
                <th>pertanyaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $question)
                <tr>
                    <td>{{ $question->id_tanya }}</td>
                    <td>{{ $question->id_produk }}</td>
                    <td>{{ $question->userid}}</td>
                    <td>{{ $question->nama_user }}</td>
                    <td>{{ $question->pertanyaan}}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>