<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Invoice</title>
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
    <h2>Laporan Invoice</h2>
    <table>
        <thead>
            <tr>
                <th>ID Invoice</th>
                <th>ID Pembayaran</th>
                <th>User ID</th>
                <th>Nama User</th>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Quantity Produk</th>
                <th>Harga Produk</th>
                <th>Jalan</th>
                <th>Kota</th>
                <th>Kecamatan</th>
                <th>Nomor Telepon</th>
                <th>Date Made</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $invoice)
                <tr>
                    <td>{{ $invoice->id_invoice }}</td>
                    <td>{{ $invoice->id_pembayaran }}</td>
                    <td>{{ $invoice->userid }}</td>
                    <td>{{ $invoice->nama_user }}</td>
                    <td>{{ $invoice->id_produk }}</td>
                    <td>{{ $invoice->nama_produk }}</td>
                    <td>{{ $invoice->quantity_produk }}</td>
                    <td>{{ $invoice->harga_produk }}</td>
                    <td>{{ $invoice->jalan }}</td>
                    <td>{{ $invoice->kota }}</td>
                    <td>{{ $invoice->kecamatan }}</td>
                    <td>{{ $invoice->nomor_telepon }}</td>
                    <td>{{ $invoice->date_made }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>