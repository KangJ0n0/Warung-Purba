<?php

namespace App\Filament\Resources\FoodstallResource\Pages;

use App\Filament\Resources\FoodstallResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoodstall extends EditRecord
{
    protected static string $resource = FoodstallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
