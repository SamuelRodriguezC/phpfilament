<?php

namespace App\Filament\Employer\Resources\ConferenceResource\Pages;

use App\Filament\Employer\Resources\ConferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Auth;

class ListConferences extends ListRecords
{
    protected static string $resource = ConferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            // // Generate PDF
            // Action::make('createPDF')
            // ->label('Crear PDF')
            // ->color('warning')
            // ->requiresConfirmation()
            // ->url(
            //     fn (): string =>route('pdf.example', ['user' => Auth::user()]),
            //     shouldOpenInNewTab: true
            // ),
        ];
    }
}
