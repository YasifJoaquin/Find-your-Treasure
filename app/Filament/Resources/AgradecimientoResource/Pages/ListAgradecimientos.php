<?php

namespace App\Filament\Resources\AgradecimientoResource\Pages;

use App\Filament\Resources\AgradecimientoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgradecimientos extends ListRecords
{
    protected static string $resource = AgradecimientoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
