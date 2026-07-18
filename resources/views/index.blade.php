@extends('layouts.app')

@section('title', 'Главная — Менеджер Задач')

@section('header-title', 'Панель управления проектами')

@section('content')
<div class="max-w-4xl mx-auto mt-4">
    <!-- Главный приветственный блок -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center sm:text-left sm:flex sm:items-center sm:justify-between transition hover:shadow-md duration-200">
        <div class="sm:max-w-xl">
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-3">
                Приветствуем вас в <span class="text-blue-600">Forms-Laravel</span>!
            </h2>
            <p class="text-gray-600 text-base leading-relaxed">
                Это современное и удобное пространство для планирования ваших дел. Создавайте задачи, отслеживайте их выполнение и распределяйте приоритеты в реальном времени. Все ваши данные надежно защищены.
            </p>
        </div>
        
        <!-- Блок с быстрыми кнопками (появляется, если пользователь гость) -->
      <div class="mt-6 sm:mt-0 flex flex-col sm:flex-row gap-3 justify-center">
            @guest
                <!-- Кнопка Войти: красивый строгий контурный стиль -->
                <a href="{{ route('login') }}" class="inline-flex justify-center items-center font-semibold text-gray-700 py-2.5 px-5 rounded-xl text-sm transition" 
                   style="border: 1px solid #d1d5db; background-color: #ffffff; cursor: pointer;">
                    Войти
                </a>
                
                <!-- Кнопка Регистрация: жесткий сочный синий цвет -->
                <a href="{{ route('register') }}" class="inline-flex justify-center items-center font-semibold text-white py-2.5 px-5 rounded-xl text-sm transition"
                   style="background-color: #2563eb; cursor: pointer; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                    Регистрация
                </a>
            @endguest

            @auth
                <!-- Кнопка Перейти к задачам: жесткий сочный зеленый цвет -->
                <a href="{{ route('dashboard') }}" class="inline-flex justify-center items-center font-semibold text-white py-2.5 px-5 rounded-xl text-sm transition"
                   style="background-color: #16a34a; cursor: pointer; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                    Перейти к задачам →
                </a>
            @endauth
        </div>
    </div>

    <!-- Блок с преимуществами (фичи) ниже -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs">
            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center font-bold mb-4">🐋</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Docker Окружение</h3>
            <p class="text-gray-600 text-sm leading-relaxed">Проект полностью изолирован и работает в стабильных контейнерах Nginx и MySQL.</p>
        </div>

        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs">
            <div class="w-10 h-10 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center font-bold mb-4">📦</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Blade Шаблоны</h3>
            <p class="text-gray-600 text-sm leading-relaxed">Использование продвинутой структуры макетов с динамическими секциями.</p>
        </div>

        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs">
            <div class="w-10 h-10 bg-green-50 text-green-600 rounded-lg flex items-center justify-center font-bold mb-4">🛠️</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Удобные Формы</h3>
            <p class="text-gray-600 text-sm leading-relaxed">Безопасная обработка POST-запросов с валидацией данных и CSRF защитой.</p>
        </div>
    </div>
</div>
@endsection
