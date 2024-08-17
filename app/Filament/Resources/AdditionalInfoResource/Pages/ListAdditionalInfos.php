<?php

namespace App\Filament\Resources\AdditionalInfoResource\Pages;

use App\Filament\Resources\AdditionalInfoResource;
use App\Models\AdditionalInfo;
use Auth;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdditionalInfos extends ListRecords
{
    protected static string $resource = AdditionalInfoResource::class;

    protected function getHeaderActions(): array
    {
        $userId = Auth::id();
        $userHasRecord = AdditionalInfo::where('user_id', $userId)->exists();
        if (!$userHasRecord) {
            return [
                Actions\CreateAction::make(),
            ];
        }
        return [];
    }
}
