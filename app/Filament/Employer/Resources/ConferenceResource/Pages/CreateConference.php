<?php

namespace App\Filament\Employer\Resources\ConferenceResource\Pages;

use App\Filament\Employer\Resources\ConferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateConference extends CreateRecord
{

    protected static string $resource = ConferenceResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['speaker_id'] = Auth::user()->speaker->id;
        return $data;
    }

}
