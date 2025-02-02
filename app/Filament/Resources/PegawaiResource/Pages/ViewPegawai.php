<?php

namespace App\Filament\Resources\PegawaiResource\Pages;

use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use App\Filament\Resources\PegawaiResource;

class ViewPegawai extends Page
{
    use InteractsWithRecord;

    protected static string $resource = PegawaiResource::class;
    protected static string $view = 'filament.resources.pegawai-resource.pages.view-pegawai';

    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }
}
