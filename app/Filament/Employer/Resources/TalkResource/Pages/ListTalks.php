<?php

namespace App\Filament\Employer\Resources\TalkResource\Pages;

use App\Filament\Employer\Resources\TalkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTalks extends ListRecords
{
    protected static string $resource = TalkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
