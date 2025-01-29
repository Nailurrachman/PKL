<?php

namespace App\Filament\Resources\GolRuResource\Pages;

use App\Filament\Resources\GolRuResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGolRu extends EditRecord
{
    protected static string $resource = GolRuResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
