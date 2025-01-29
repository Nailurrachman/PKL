<?php

namespace App\Filament\Resources\SatkerResource\Pages;

use App\Filament\Resources\SatkerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSatker extends EditRecord
{
    protected static string $resource = SatkerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
