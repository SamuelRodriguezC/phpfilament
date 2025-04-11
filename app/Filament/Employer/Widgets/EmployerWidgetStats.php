<?php

namespace App\Filament\Employer\Widgets;

use App\Models\Conference;
use App\Models\Speaker;
use App\Models\Talk;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class EmployerWidgetStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Tus Conferencias', $this->getConferencesCount(Auth::user())),
            Stat::make('Total de Charlas', $this->getTalksCount(Auth::user())),
            Stat::make('Total Conferencias', $this->allConferences()),
        ];
    }

    protected function getConferencesCount(User $user){
        $totalConferences = Conference::where('speaker_id', $user->speaker->id)->get()->count();
        return $totalConferences;
    }

    protected function getTalksCount(User $user) {
        return $user->speaker->conferences->sum(function ($conference) {
            return $conference->talks->count();
        });
    }

    protected function allConferences() {
        return Conference::get()->count();

    }







}

