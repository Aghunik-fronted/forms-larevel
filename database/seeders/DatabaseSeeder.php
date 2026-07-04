<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Создаем пользователя для входа
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        // 2. Запускаем ваш сидер задач
        $this->call([
            TaskSeeder::class,
        ]);
    }
}
