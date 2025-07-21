<?php

namespace App\Filament\Admin\Resources\PendaftaranBeasiswaResource\Pages;

use App\Filament\Admin\Resources\PendaftaranBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendaftaranBeasiswas extends ListRecords
{
    protected static string $resource = PendaftaranBeasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
