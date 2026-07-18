<?php

use App\Models\Task;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// 1. Главная страница (Публичная, без редиректов и проверок)
Route::get('/', function () {
    return view('index');
});

// 2. Личный кабинет и управление задачами (Доступно строго ПОСЛЕ авторизации)
Route::middleware(['auth'])->group(function () {
    
    // Показ страницы со списком задач пользователя
    Route::get('/dashboard', function () {
        $tasks = Task::where('user_id', \Illuminate\Support\Facades\Auth::id())->get();
        return view('dashboard', compact('tasks'));
    })->name('dashboard');

    // Сохранение новой задачи
    Route::post('/dashboard/tasks', function (Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Задача успешно добавлена!');
    })->name('tasks.store');

    Route::delete('/dashboard/tasks/{task}', function (Task $task) {
        // Проверяем безопасность: удалить можно только СВОЮ задачу
        if ($task->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            abort(403);
        }

        $task->delete(); 

        return redirect()->route('dashboard')->with('success', 'Задача успешно удалена!');
    })->name('tasks.destroy');
});

// 3. Маршруты профиля (Стандартный блок Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. Подключение встроенных роутов авторизации Breeze (login, register, logout)
require __DIR__.'/auth.php';
