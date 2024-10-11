<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
// use App\Models\Transaction;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPemasukan = \App\Models\Transaction::totalPemasukan();
        $totalPengeluaran = \App\Models\Transaction::totalPengeluaran();
 
        return [
            Stat::make('Pemasukan', 'Rp. ' . number_format($totalPemasukan, 2) . ' - ')
                ->description('Pemasukan bulan ini')
                ->color('success')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Pengeluaran', 'Rp. ' . number_format($totalPengeluaran, 2) . ' - ')
                ->description('Pengeluaran bulan ini')
                ->color('danger')
                ->descriptionIcon('heroicon-m-arrow-trending-down'),
            Stat::make('Saldo', 'Rp. ' . number_format($totalPemasukan - $totalPengeluaran, 2) . ' - ')
                ->description('Saldo bulan ini')
                ->color('warning'),
        ];
    }
}
