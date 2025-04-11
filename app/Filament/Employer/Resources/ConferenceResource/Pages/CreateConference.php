<?php

namespace App\Filament\Employer\Resources\ConferenceResource\Pages;


use App\Filament\Employer\Resources\ConferenceResource;
use App\Filament\Employer\Resources\TalkResource\Pages\CreateTalk as PagesCreateTalk;
use App\Mail\ConferenceCreated;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class CreateConference extends CreateRecord
{
    protected static string $resource = ConferenceResource::class;

    // Asigna el speaker_id antes de crear el registro
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['speaker_id'] = Auth::user()->speaker->id;
        $userSession = User::find(Auth::user());
        $dataToSend = array(
            'name' => $data['name'],
            'description' => $data['description'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'SpeakerName' => Auth::user()->speaker->name,
        );
        Mail::to($userSession)->send(new ConferenceCreated($dataToSend));
        return $data;
    }

    // Muestra la notificación después de crear el registro
    protected function afterCreate(): void
    {
        Notification::make()
            ->title("¡La Conferencia ha sido guardada exitosamente!")
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
