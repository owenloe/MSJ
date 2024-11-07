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
    <h2>Laporan Notification</h2>
    <table>
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Jenis Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $notification)
                <tr>
                    <td>{{ $notification->id_notif }}</td>
                    <td>{{ $notification->userid }}</td>
                    <td>{{ $notification->notifikasi }}</td>
                    <td>{{ $notification->objek }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>