<?php

namespace App\Filament\Employer\Resources\TalkResource\Pages;

use App\Filament\Employer\Resources\TalkResource;
use App\Filament\Employer\Resources\TalkResource\Pages\CreateTalk as PagesCreateTalk;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CreateTalk extends CreateRecord
{
    protected static string $resource = TalkResource::class;


        // Muestra la notificación después de crear el registro
        protected function afterCreate(): void
        {
            $recipient = Auth::user();
            Notification::make()
            ->sendToDatabase($recipient)
            ->title("¡La Charla ha sido guardada exitosamente!")
            ->body('Ahora puedes ver las charlas')
            ->icon('heroicon-o-chat-bubble-left-right')
            ->success()
            // ->actions([
            //     Action::make('Crear Charlas')
            //         ->button()
            //         ->url(PagesCreateTalk::getUrl()),

            // ])
            ->send();
        }

}
