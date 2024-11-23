<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px; /* Reduce font size */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 4px; /* Reduce padding */
            text-align: left;
            border: 1px solid #ddd;
            word-wrap: break-word; /* Ensure long words break to fit in the cell */
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Pengguna</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Jalan</th>
                <th>Kota</th>
                <th>Kecamatan</th>
                <th>Nomor Telepon</th>
                <th>Is Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $pengguna)
                <tr>
                    <td>{{ $pengguna->userid }}</td>
                    <td>{{ $pengguna->nama }}</td>
                    <td>{{ $pengguna->email }}</td>
                    <td>{{ $pengguna->password }}</td>
                    <td>{{ $pengguna->jalan }}</td>
                    <td>{{ $pengguna->kota }}</td>
                    <td>{{ $pengguna->kecamatan }}</td>
                    <td>{{ $pengguna->nomor_telepon }}</td>
                    <td>{{ $pengguna->is_admin ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>