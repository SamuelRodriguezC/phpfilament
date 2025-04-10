<?php

namespace App\Filament\Employer\Widgets;

use App\Models\Conference;
use App\Models\Speaker;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class EmployerWidgetStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Conferencias', $this->getConferencesCount(Auth::user())),
            Stat::make('Bounce rate', '21%'),
            Stat::make('total Conferencias', '3:12'),
        ];
    }

    protected function getConferencesCount(User $user){
        $totalConferences = Conference::where('speaker_id', $user->speaker->id)->get()->count();
        return $totalConferences;
    }

    
}

