<?php

namespace App\Filament\Resources\AdditionalInfoResource\Pages;

use App\Filament\Resources\AdditionalInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdditionalInfo extends EditRecord
{
    protected static string $resource = AdditionalInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }
}
