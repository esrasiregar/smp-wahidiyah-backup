<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
{
    if (auth()->user()->role === 'admin') {
        return [
            \App\Filament\Widgets\StudentsCountWidget::class,
            \App\Filament\Widgets\DashboardStatsWidget::class,
            \App\Filament\Widgets\TeacherAttendanceWidget::class,
        ];
    }

    if (auth()->user()->role === 'staff') {
        return [
            \App\Filament\Widgets\StudentsCountWidget::class,
            \App\Filament\Widgets\StaffAttendanceWidget::class,
        ];
    }

    return [];
}
}
