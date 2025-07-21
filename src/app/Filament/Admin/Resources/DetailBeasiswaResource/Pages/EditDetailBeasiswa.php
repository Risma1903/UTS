<?php

namespace App\Filament\Admin\Resources\DetailBeasiswaResource\Pages;

use App\Filament\Admin\Resources\DetailBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailBeasiswa extends EditRecord
{
    protected static string $resource = DetailBeasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
