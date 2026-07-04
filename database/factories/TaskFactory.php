<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition(): array
    {
        return [
            'title' => fake()->sentence(3), // Случайная строка из 3 слов (заголовок)
            'description' => fake()->paragraph(), // Случайный абзац текста (описание)
            'user_id' => 1, // Привязываем к ID нашего администратора
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
