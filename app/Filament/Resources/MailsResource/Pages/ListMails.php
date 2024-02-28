<?php

namespace App\Filament\Resources\MailsResource\Pages;

use App\Filament\Resources\MailsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMails extends ListRecords
{
    protected static string $resource = MailsResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
