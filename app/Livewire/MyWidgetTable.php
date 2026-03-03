<?php

namespace App\Livewire;

use App\Models\Project;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Task;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;

class MyWidgetTable extends TableWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->heading('Таблица с задачами')
            ->query(fn (): Builder => Task::query())
        ->columns([
                TextColumn::make('title')
                ->label('Название')
                ->searchable(),
                TextColumn::make('description')
                ->label('описание')
                ->searchable()
                ->width('5%'),
                TextColumn::make('status')
                ->label('Статус')
                ->sortable(),
                TextColumn::make('priority')
                ->label('Приоритет')
                ->numeric()
                ->sortable(),
                TextColumn::make('deadline')
                ->label('Дедлайн')
                ->sortable()
                ->date(),
                TextColumn::make('project_id')
                ->label('Проект'),
                TextColumn::make('user_id')
                ->label('Исполнитель')

            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->schema([
                        TextInput::make('title')
                        ->label('Название')
                        ->required()
                        ->maxLength(255),
                        TextInput::make('description')
                        ->required()
                        ->maxLength(255)
                        ->label('описание'),
                        Select::make('status')
                        ->label('Статус')
                        ->options([
                            'новая' => 'новая',
                            'в работе' => 'в работе',
                            'выполнена' => 'выполнена'
                        ])
                        ->noOptionsMessage('Нету статусов')
                        ->required(),
                        TextInput::make('priority')
                        ->label('Приоритет')
                        ->required()
                        ->numeric(),
                        DatePicker::make('deadline')
                        ->label('Дедлайн')
                        ->required()
                        ->format('Y-m-d'),
                        Select::make('project_id')
                        ->label('Проект')
                        ->noOptionsMessage('Нету созданных проектов')
                        ->noSearchResultsMessage('Нету проекта с таким названием')
                        ->loadingMessage('Загрузка проектов ')
                        ->searchable()
                        ->options(function () {
                            return Project::pluck('title', 'id');
                        })
                        ->getSearchResultsUsing(function ($value){
                            return Project::where('title', 'like', "%{$value}%")
                                ->pluk('title', 'id');
                        })
                        ->getOptionLabelUsing(function ($value) {
                            return Project::find($value)->title;
                        }),
                        Hidden::make('user_id')
                        ->default(auth()->id())
                    ])
            ])

            ->recordActions([

                ActionGroup::make([
                    EditAction::make('Отредактировать')
                    ->schema([
                        TextInput::make('title')
                        ->label('Название')
                        ->required(),
                        TextInput::make('description')
                        ->label('Описание')
                        ->required(),
                        Select::make('status')
                        ->label('Статус')
                        ->options([
                            'новая' => 'новая',
                            'в работе' => 'в работе',
                            'выполнена' => 'выполнена'
                        ])
                        ->required(),
                        TextInput::make('priority')
                        ->label('Приоритет')
                        ->required(),
                        DatePicker::make('deadline')
                        ->label('Дедлайн')
                        ->required()
                        ->format('Y-m-d'),
                        Select::make('project_id')
                        ->label('Проект')
                        ->noOptionsMessage('Нету созданных проектов')
                        ->noSearchResultsMessage('Нету проекта с таким названием')
                        ->loadingMessage('Загрузка проектов ')
                        ->searchable()
                        ->options(function () {
                            return Project::pluck('title', 'id');
                        })
                        ->getSearchResultsUsing(function ($value){
                            return Project::where('title', 'like', "%{$value}%")
                                ->pluk('title', 'id');
                        })
                        ->getOptionLabelUsing(function ($value) {
                            return Project::find($value)->title;
                        }),
                        Hidden::make('user_id')
                        ->default(auth()->id())
                    ]),
                    ViewAction::make('Просмотреть')
                    ->schema([
                        TextInput::make('title')
                            ->label('Название')
                            ->required(),
                        TextInput::make('description')
                            ->label('Описание')
                            ->required(),
                        Select::make('status')
                            ->label('Статус')
                            ->options([
                                'новая' => 'новая',
                                'в работе' => 'в работе',
                                'выполнена' => 'выполнена'
                            ])
                            ->required(),
                        TextInput::make('priority')
                            ->label('Приоритет')
                            ->required(),
                        DatePicker::make('deadline')
                            ->label('Дедлайн')
                            ->required()
                            ->format('Y-m-d'),
                        Select::make('project_id')
                            ->label('Проект')
                            ->noOptionsMessage('Нету созданных проектов')
                            ->noSearchResultsMessage('Нету проекта с таким названием')
                            ->loadingMessage('Загрузка проектов ')
                            ->searchable()
                            ->options(function () {
                                return Project::pluck('title', 'id');
                            })
                            ->getSearchResultsUsing(function ($value){
                                return Project::where('title', 'like', "%{$value}%")
                                    ->pluk('title', 'id');
                            })
                            ->getOptionLabelUsing(function ($value) {
                                return Project::find($value)->title;
                            }),
                        TextInput::make('user_id')
                            ->default(auth()->id())
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
