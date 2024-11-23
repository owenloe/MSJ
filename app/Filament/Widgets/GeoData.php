<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class GeoData extends ChartWidget
{
    protected static ?string $heading = 'User Distribution by City';
    
    // Add sort order - higher numbers appear lower on page
    protected static ?int $sort = 3;

    // Control widget width - half width
    protected int | string | array $columnSpan = '1/2';

    protected function getData(): array
    {
        // Query the database to get the count of users grouped by city
        $usersByCity = DB::table('penggunas')
            ->select(DB::raw('kota'), DB::raw('count(*) as count'))
            ->groupBy('kota')
            ->orderBy('count', 'desc')
            ->get();

        // Format the data for the chart
        $labels = $usersByCity->pluck('kota')->toArray();
        $data = $usersByCity->pluck('count')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Number of Users',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}