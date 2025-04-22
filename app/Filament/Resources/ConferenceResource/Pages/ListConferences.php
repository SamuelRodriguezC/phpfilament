<?php

namespace App\Filament\Resources\ConferenceResource\Pages;

use App\Filament\Resources\ConferenceResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
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
