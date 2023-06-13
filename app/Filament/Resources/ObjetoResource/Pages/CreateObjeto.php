<?php

namespace App\Filament\Resources\ObjetoResource\Pages;

use App\Filament\Resources\ObjetoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

use Filament\Notifications\Notification;

class CreateObjeto extends CreateRecord
{
    protected static string $resource = ObjetoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('filament.resources.roles.index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
        ->success()
        ->title('Rol Creado')
        ->body('El Rol ha sido asignado satisfactoriamente');
    }
}
