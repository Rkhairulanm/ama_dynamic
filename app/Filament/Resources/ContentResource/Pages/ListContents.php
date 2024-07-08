<?php

namespace App\Filament\Resources\ContentResource\Pages;

use App\Filament\Resources\ContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListContents extends ListRecords
{
    protected static string $resource = ContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
            'Info' => Tab::make()->modifyQueryUsing(function ($query) {
                $query->whereIn('type', ['Location', 'Phone', 'Email']);
            }),
            'Sosmed' => Tab::make()->modifyQueryUsing(function ($query) {
                $query->whereIn('type', ['instagram', 'facebook']);
            }),
            'Beranda' => Tab::make()->modifyQueryUsing(function ($query) {
                $query->whereIn('type', ['Hero Title', 'Hero Description', 'House Card Title', 'House Card Description', 'LightBlub Card Title', 'Light Blub Description', 'Gears Card Title', 'Gears Description']);
            }),
            'Tentang' => Tab::make()->modifyQueryUsing(function ($query) {
                $query->whereIn('type', ['Tentang Title', 'Tentang', 'Visi', 'Misi']);
            }),
        ];
    }
}
