<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\MyWidgetProjectTable;
use App\Livewire\MyWidgetTable;
use App\Models\Task;
use Filament\Pages\Page;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class Settings extends Page
{
    protected static ?string $model = Task::class;
    protected string $view = 'filament.pages.settings';
    protected function getFooterWidgets(): array
    {
        return [
            MyWidgetTable::class,
            MyWidgetProjectTable::class
        ];
    }
}
