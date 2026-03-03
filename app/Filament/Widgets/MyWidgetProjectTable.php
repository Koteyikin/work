<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class MyWidgetProjectTable extends TableWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {

        return $table
            ->query(fn (): Builder => Project::query())
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('description'),
                TextColumn::make('creator'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('description')
                            ->required(),
                        TextInput::make('creator')
                            ->required(),
                    ])
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make('Отредактировать')
                    ->schema([
                        TextInput::make('title')
                        ->required(),
                        TextInput::make('description')
                        ->required(),
                        TextInput::make('creator')
                        ->required(),
                    ]),
                    ViewAction::make('Просмотреть')
                    ->schema([
                        TextInput::make('title'),
                        TextInput::make('description'),
                        TextInput::make('creator'),
                    ]),
                    DeleteAction::make('Удалить'),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
