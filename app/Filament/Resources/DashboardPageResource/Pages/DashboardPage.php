<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class DashboardPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.dashboard-page';
    protected static ?string $title = 'لوحة التحكم العامة';
    protected static ?string $navigationLabel = 'لوحة التحكم';
    protected static ?int $navigationSort = -1;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
