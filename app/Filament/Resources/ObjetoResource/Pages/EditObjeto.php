<?php

namespace App\Filament\Resources\ObjetoResource\Pages;

use App\Filament\Resources\ObjetoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditObjeto extends EditRecord
{
    protected static string $resource = ObjetoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
