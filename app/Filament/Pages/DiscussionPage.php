<?php

namespace App\Filament\Pages;

use App\Livewire\StatsOverview;
use Filament\Pages\Page;

class DiscussionPage extends Page
{
    protected string $view = 'filament.pages.discussion-page';

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
