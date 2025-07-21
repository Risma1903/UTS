<?php

namespace App\Filament\Admin\Resources\BeasiswaBaruResource\Pages;

use App\Filament\Admin\Resources\BeasiswaBaruResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeasiswaBarus extends ListRecords
{
    protected static string $resource = BeasiswaBaruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
