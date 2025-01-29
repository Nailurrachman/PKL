<?php

namespace App\Filament\Resources\TempatLahirResource\Pages;

use App\Filament\Resources\TempatLahirResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTempatLahir extends EditRecord
{
    protected static string $resource = TempatLahirResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
