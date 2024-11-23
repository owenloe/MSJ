<!-- resources/views/laporan/ProductSalesByCategoryReport.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Sales by Category Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Product Sales by Category Report</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Type</th>
                    <th>Product Name</th>
                    <th>Total Quantity Sold</th>
                    <th>Total Sales</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id_kategori }}</td>
                        <td>{{ $item->jenis_kategori }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->total_quantity_sold }}</td>
                        <td>{{ number_format($item->total_sales, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer">
    <p>Dicetak pada: {{ date('Y-m-d H:i:s') }}</p>
</div>
</body>
</html>