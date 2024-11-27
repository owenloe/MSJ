<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Notification</title>
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
    <h2>Laporan Notification</h2>
    <table>
        <thead>
            <tr>
                <th>ID Notifikasi</th>
                <th>User ID</th>
                <th>Notifikasi</th>
                <th>Objek</th>
                <th>Nama User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $notification)
                <tr>
                    <td>{{ $notification->id_notif }}</td>
                    <td>{{ $notification->userid }}</td>
                    <td>{{ $notification->notifikasi }}</td>
                    <td>{{ $notification->objek }}</td>
                    <td>{{ $notification->nama_user }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>