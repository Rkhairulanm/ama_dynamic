<?php

namespace App\Filament\Resources\BerlanggananResource\Pages;

use App\Filament\Resources\BerlanggananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerlangganan extends EditRecord
{
    protected static string $resource = BerlanggananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
