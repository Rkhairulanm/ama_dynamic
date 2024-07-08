<?php

namespace App\Filament\Resources\BerlanggananResource\Pages;

use App\Filament\Resources\BerlanggananResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBerlangganan extends CreateRecord
{
    protected static string $resource = BerlanggananResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
