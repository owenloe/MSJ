<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class PenjualanPerBarang extends ChartWidget
{
    protected static ?string $heading = 'Penjualan Per Barang';

    protected function getData(): array
    {
        // Fetch the sales data from the database
        $salesData = Invoice::select('id_produk', DB::raw('SUM(quantity_produk * harga_produk) as total_sales'))
            ->groupBy('id_produk')
            ->get();

        // Calculate the total sales amount
        $totalSales = $salesData->sum('total_sales');

        // Prepare the data for the chart
        $labels = [];
        $data = [];
        $backgroundColor = [];

        // Define colors for the products
        $colors = [
            'Bright Gas 3KG' => '#FF6384',
            'Bright Gas 12KG' => '#36A2EB',
            'Elpiji 3KG' => '#FFCE56',
            'Elpiji 5.5KG' => '#4BC0C0',
            'Elpiji 12KG' => '#9966FF',
            'Elpiji 50KG' => '#FF9F40',
        ];

        foreach ($salesData as $sale) {
            $product = $sale->produk; // Assuming the relationship is defined in the Invoice model
            $labels[] = $product->nama_produk;
            $data[] = $sale->total_sales;
            $backgroundColor[] = $colors[$product->nama_produk] ?? '#000000'; // Default to black if color not found
        }

        // Update the heading to include the total sales amount
        static::$heading = 'Penjualan Per Barang - Total Sales: Rp ' . number_format($totalSales, 2, ',', '.');

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Sales in Rupiah',
                    'data' => $data,
                    'backgroundColor' => $backgroundColor,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'aspectRatio' => 1.5, // Adjust this value to make the chart smaller or larger
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'display' => false,
                ],
                'x' => [
                    'display' => false,
                ],
            ],
        ];
    }
}