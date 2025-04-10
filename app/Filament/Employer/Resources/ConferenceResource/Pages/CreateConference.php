<?php

namespace App\Filament\Employer\Resources\ConferenceResource\Pages;


use App\Filament\Employer\Resources\ConferenceResource;
use App\Filament\Employer\Resources\TalkResource\Pages\CreateTalk as PagesCreateTalk;
use Filament\Notifications\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class CreateConference extends CreateRecord
{
    protected static string $resource = ConferenceResource::class;

    // Asigna el speaker_id antes de crear el registro
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['speaker_id'] = Auth::user()->speaker->id;
        return $data;
    }

    // Muestra la notificación después de crear el registro
    protected function afterCreate(): void
    {
        Notification::make()
            ->title('¡La descripción ha sido guardada exitosamente!')
            ->body('Ahora puedes dar la conferencia o asignarle charlas')
            ->icon('heroicon-o-chat-bubble-left-right')
            ->success()
            ->actions([
                Action::make('Crear Charlas')
                    ->button()
                    ->url(PagesCreateTalk::getUrl()),

            ])
            ->send();

    }

    // Esto desactiva la notificación por defecto de Filament
    protected function getCreatedNotification(): ?Notification
    {
        return null;
    }
}
