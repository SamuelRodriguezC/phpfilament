<?php

namespace App\Filament\Employer\Resources\TalkResource\Pages;

use App\Filament\Employer\Resources\TalkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTalk extends EditRecord
{
    protected static string $resource = TalkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
