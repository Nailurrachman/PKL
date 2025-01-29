<?php

namespace App\Filament\Resources\GolRuResource\Pages;

use App\Filament\Resources\GolRuResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGolRus extends ListRecords
{
    protected static string $resource = GolRuResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
