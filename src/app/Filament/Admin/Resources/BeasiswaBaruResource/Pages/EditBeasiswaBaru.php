<?php

namespace App\Filament\Admin\Resources\BeasiswaBaruResource\Pages;

use App\Filament\Admin\Resources\BeasiswaBaruResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBeasiswaBaru extends EditRecord
{
    protected static string $resource = BeasiswaBaruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
