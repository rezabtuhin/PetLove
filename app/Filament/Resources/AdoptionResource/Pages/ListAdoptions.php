<?php

namespace App\Filament\Resources\AdoptionResource\Pages;

use App\Filament\Resources\AdoptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdoptions extends ListRecords
{
    protected static string $resource = AdoptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
