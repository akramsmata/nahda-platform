<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class StatisticsDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static string $view = 'filament.pages.statistics-dashboard';
    protected static ?string $title = 'لوحة الإحصائيات';
}
