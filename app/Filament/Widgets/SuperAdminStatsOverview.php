<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Theme;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SuperAdminStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalUsers = User::count();
        $premiumUsers = User::role('premium_user')->count();
        $freeUsers = User::role('free_user')->count();
        $totalThemes = Theme::count();
        $activeThemes = Theme::where('is_active', true)->count();
        $premiumThemes = Theme::where('is_premium', true)->count();

        return [
            Stat::make('Total Users', $totalUsers)
                ->description("Premium: {$premiumUsers} | Free: {$freeUsers}")
                ->descriptionIcon('heroicon-m-user-group')
                ->chart([7, 12, 15, 18, 22, 25, $totalUsers])
                ->color('success'),

            Stat::make('Premium Users', $premiumUsers)
                ->description(round(($premiumUsers / max($totalUsers, 1)) * 100, 1) . '% of total users')
                ->descriptionIcon('heroicon-m-star')
                ->chart([2, 4, 6, 8, 10, 12, $premiumUsers])
                ->color('warning'),

            Stat::make('Total Themes', $totalThemes)
                ->description("Active: {$activeThemes} | Premium: {$premiumThemes}")
                ->descriptionIcon('heroicon-m-paint-brush')
                ->chart([1, 2, 2, 3, 3, 3, $totalThemes])
                ->color('primary'),

            Stat::make('Total Projects', Project::count())
                ->description('Across all users')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('info'),
        ];
    }

    /**
     * Only visible to Super Admins
     */
    public static function canView(): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }

    protected static ?int $sort = 1;
}