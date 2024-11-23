<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Payment</title>
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
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Payment</h2>
    <table>
        <thead>
            <tr>
                <th>ID Pembayaran</th>
                <th>Nama Rekening</th>
                <th>Nomor Rekening</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $payment)
                <tr>
                    <td>{{ $payment->id_pembayaran }}</td>
                    <td>{{ $payment->nama_rek }}</td>
                    <td>{{ $payment->nomor_rek }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>