<?php

namespace App\Filament\Resources\BerlanggananResource\Pages;

use App\Filament\Resources\BerlanggananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBerlangganans extends ListRecords
{
    protected static string $resource = BerlanggananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
