<?php

namespace ServerStatus\PlayerCounter\Filament\Admin\Resources\GameQueries\Pages;

use ServerStatus\PlayerCounter\Filament\Admin\Resources\GameQueries\GameQueryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageGameQueries extends ManageRecords
{
    protected static string $resource = GameQueryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->createAnother(false),
        ];
    }
}
