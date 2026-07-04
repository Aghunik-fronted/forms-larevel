<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task; // ОБЯЗАТЕЛЬНО импортируем модель Task

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // Создаст 10 случайных задач, используя настройки из TaskFactory
        Task::factory()->count(10)->create();
    }
}