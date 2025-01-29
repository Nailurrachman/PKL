<?php

namespace App\Filament\Resources\TempatLahirResource\Pages;

use App\Filament\Resources\TempatLahirResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTempatLahirs extends ListRecords
{
    protected static string $resource = TempatLahirResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
