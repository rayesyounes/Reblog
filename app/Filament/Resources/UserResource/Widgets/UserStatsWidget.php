<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Users Count', User::where('role', User::USER_ROLE)->count()),
            Stat::make('Admins Count', User::where('role', User::ADMIN_ROLE)->count()),
            Stat::make('Editors Count', User::where('role', User::EDITOR_ROLE)->count()),
        ];
    }
}
