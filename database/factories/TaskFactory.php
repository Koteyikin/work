<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['новая', 'в работе', 'выполнена']),
            'priority' => $this->faker->randomElement(['Высокий', 'Средний', 'Низкий']),
            'deadline' => $this->faker->date(),
            'project_id' => Project::factory(),
            'user_id' => User::factory(),
        ];
    }
}
