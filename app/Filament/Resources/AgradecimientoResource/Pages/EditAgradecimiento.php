<?php

namespace App\Filament\Resources\AgradecimientoResource\Pages;

use App\Filament\Resources\AgradecimientoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgradecimiento extends EditRecord
{
    protected static string $resource = AgradecimientoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
