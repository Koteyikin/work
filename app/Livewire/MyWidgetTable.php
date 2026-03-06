<?php

namespace App\Livewire;

use App\Mail\CustomMail;
use App\Models\Project;
use App\Models\Task;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;


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
                    ->label('Описание')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('status')
                    ->label('Статус')
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'новая' => 'gray',
                        'в работе' => 'warning',
                        'выполнена' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('priority')
                    ->label('Приоритет')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'danger',
                        '2' => 'warning',
                        '3' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        '1' => 'Высокий',
                        '2' => 'Средний',
                        '3' => 'Низкий',
                        default => $state,
                    }),
                TextColumn::make('deadline')
                    ->label('Дедлайн')
                    ->sortable()
                    ->date('d.m.Y'),
                TextColumn::make('project.title')
                    ->label('Проект')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Исполнитель')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('send email')

                ->form([
                    TextInput::make('email')
                    ->email()
                    ->label('Email получателя')
                    ->required(),
                ])
                ->action(function (array $data, $record): void {
                    Mail::to($data['email'])->send(new CustomMail([
                        'user' => $record,
                        'message' => $data['message'] ?? null,
                    ]));
                Notification::make()
                    ->title('Успешно')
                    ->body('Письмо отправлено на '. $data['email'])
                    ->send();
                })
                ->label('Отправить письмо'),
                Action::make('create')
                    ->label('Новая задача')
                    ->icon('heroicon-m-plus')
                    ->form([
                        TextInput::make('title')
                            ->label('Название')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('description')
                            ->required()
                            ->maxLength(255)
                            ->label('Описание'),
                        Select::make('status')
                            ->label('Статус')
                            ->options([
                                'новая' => 'новая',
                                'в работе' => 'в работе',
                                'выполнена' => 'выполнена'
                            ])
                            ->default('новая')
                            ->required(),
                        Select::make('priority')
                            ->label('Приоритет')
                            ->options([
                                1 => 'Высокий',
                                2 => 'Средний',
                                3 => 'Низкий',
                            ])
                            ->required()
                            ->default(2),
                        DatePicker::make('deadline')
                            ->label('Дедлайн')
                            ->required()
                            ->format('Y-m-d')
                            ->minDate(now()),
                        Select::make('project_id')
                            ->label('Проект')
                            ->noOptionsMessage('Нет созданных проектов')
                            ->noSearchResultsMessage('Нет проекта с таким названием')
                            ->searchable()
                            ->options(function () {
                                return Project::pluck('title', 'id');
                            })
                            ->getSearchResultsUsing(function ($value) {
                                return Project::where('title', 'like', "%{$value}%")
                                    ->pluck('title', 'id');
                            })
                            ->getOptionLabelUsing(function ($value) {
                                return Project::find($value)?->title ?? 'Не найден';
                            })
                            ->required(),
                        Hidden::make('user_id')
                            ->default(auth()->id())
                    ])
                    ->action(function (array $data): void {
                        Task::create($data);
                    })
//                Action:make('отправка письма на почту ')
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('changeStatus')
                        ->label('Изменить статус')
                        ->icon('heroicon-m-arrow-path')
                        ->form([
                            Select::make('new_status')
                                ->label('Новый статус')
                                ->options(function (Task $record): array {
                                    return $this->getAvailableStatuses($record->status);
                                })
                                ->required()
                                ->helperText(function (Task $record): string {
                                    return $this->getStatusHelperText($record->status);
                                }),
                            Placeholder::make('current_status')
                                ->label('Текущий статус')
                                ->content($record->status ?? 'не указан'),
                        ])
                        ->action(function (Task $record, array $data): void {
                            $record->update(['status' => $data['new_status']]);
                        })
                        ->visible(function (Task $record): bool {
                            return $record->status !== 'выполнена';
                        }),

                    EditAction::make('edit')
                        ->label('Редактировать')
                        ->icon('heroicon-m-pencil-square')
                        ->modalHeading('Редактировать задачу')
                        ->form([
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
                                ->disabled()
                                ->helperText('Статус можно изменить только через действие "Изменить статус"'),
                            Select::make('priority')
                                ->label('Приоритет')
                                ->options([
                                    1 => 'Высокий',
                                    2 => 'Средний',
                                    3 => 'Низкий',
                                ])
                                ->required(),
                            DatePicker::make('deadline')
                                ->label('Дедлайн')
                                ->required()
                                ->format('Y-m-d'),
                            Select::make('project_id')
                                ->label('Проект')
                                ->noOptionsMessage('Нет созданных проектов')
                                ->searchable()
                                ->options(function () {
                                    return Project::pluck('title', 'id');
                                })
                                ->getSearchResultsUsing(function ($value) {
                                    return Project::where('title', 'like', "%{$value}%")
                                        ->pluck('title', 'id');
                                })
                                ->getOptionLabelUsing(function ($value) {
                                    return Project::find($value)?->title ?? 'Не найден';
                                })
                                ->required(),
                        ])
                        ->mutateFormDataUsing(function (array $data): array {
                            unset($data['status']);
                            return $data;
                        }),

                    ViewAction::make('view')
                        ->label('Просмотр')
                        ->icon('heroicon-m-eye')
                        ->modalHeading('Просмотр задачи')
                        ->form([
                            TextInput::make('title')
                                ->label('Название')
                                ->disabled(),
                            TextInput::make('description')
                                ->label('Описание')
                                ->disabled(),
                            TextInput::make('status')
                                ->label('Статус')
                                ->disabled(),
                            TextInput::make('priority')
                                ->label('Приоритет')
                                ->disabled()
                                ->formatStateUsing(fn ($state) => match ($state) {
                                    '1' => 'Высокий',
                                    '2' => 'Средний',
                                    '3' => 'Низкий',
                                    default => $state,
                                }),
                            TextInput::make('deadline')
                                ->label('Дедлайн')
                                ->disabled()
                                ->formatStateUsing(fn ($state) => $state ? date('d.m.Y', strtotime($state)) : ''),
                            TextInput::make('project.title')
                                ->label('Проект')
                                ->disabled(),
                            TextInput::make('user.name')
                                ->label('Исполнитель')
                                ->disabled(),
                        ]),

                    DeleteAction::make('delete')
                        ->label('Удалить')
                        ->icon('heroicon-m-trash')
                        ->modalHeading('Удалить задачу'),
                ])
            ]);
    }
    private function getAvailableStatuses(string $currentStatus): array
    {
        return match ($currentStatus) {
            'новая' => [
                'в работе' => 'в работе'
            ],
            'в работе' => [
                'выполнена' => 'выполнена'
            ],
            'выполнена' => [],
            default => [
                'новая' => 'новая',
                'в работе' => 'в работе',
                'выполнена' => 'выполнена'
            ],
        };
    }
    private function getStatusHelperText(string $currentStatus): string
    {
        return match ($currentStatus) {
            'новая' => 'Можно перевести только в статус "в работе"',
            'в работе' => 'Можно перевести только в статус "выполнена"',
            'выполнена' => 'Статус "выполнена" является конечным, изменение невозможно',
            default => '',
        };
    }
}
