<?php

namespace Boy132\GenericOIDCProviders\Filament\Admin\Resources\GenericOIDCProviders\Pages;

use Boy132\GenericOIDCProviders\Filament\Admin\Resources\GenericOIDCProviders\GenericOIDCProviderResource;
use Boy132\GenericOIDCProviders\Models\GenericOIDCProvider;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGenericOIDCProviders extends ListRecords
{
    protected static string $resource = GenericOIDCProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->hidden(fn () => GenericOIDCProvider::count() <= 0),
        ];
    }
}
