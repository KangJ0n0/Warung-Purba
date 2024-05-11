<?php

namespace App\Filament\Resources\FoodstallResource\Pages;

use App\Filament\Resources\FoodstallResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFoodstalls extends ListRecords
{
    protected static string $resource = FoodstallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
