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
            position: relative;
            min-height: 100vh;
            margin: 0;
            padding-bottom: 50px; /* Height of the footer */
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
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
        }
        th:nth-child(odd) {
            background-color: #45a049; /* Slightly darker green for odd columns */
        }
        th:nth-child(even) {
            background-color: #4CAF50; /* Green background for even columns */
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .footer {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            text-align: center;
            padding: 10px 0;
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
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Total Demand</th>
                    <th>Total Quantity Sold</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id_kategori }}</td>
                        <td>{{ $item->jenis_kategori }}</td>
                        <td>{{ $item->id_produk }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->total_demand }}</td>
                        <td>{{ $item->total_quantity_sold }}</td>                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p>Dicetak pada: {{ date('Y-m-d H:i:s') }}</p>
    </div>
</body>
</html>