<?php

namespace App\Filament\Resources\AktifitasResource\Pages;

use App\Filament\Resources\AktifitasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAktifitas extends ListRecords
{
    protected static string $resource = AktifitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
