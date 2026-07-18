@extends('layouts.app')

@section('title', 'Мои задачи')

@section('header-title', 'Мои задачи')

@section('content')
<div class="max-w-3xl mx-auto flex flex-col gap-6">

       <div class="flex justify-end bg-white p-4 rounded-xl shadow-xs border border-gray-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <button type="submit" style="background-color: #ef4444; color: white; padding: 8px 16px; font-weight: 500; border: none; border-radius: 6px; cursor: pointer; font-size: 14px; transition: background 0.15s;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">
                        Выйти из системы
                    </button>
            </form>
        </div>

    <!-- ФОРМА: Создание новой задачи -->
    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-200">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Создать новую задачу</h2>
        
        <form method="POST" action="{{ route('tasks.store') }}" class="flex flex-col gap-4">
            @csrf 

            <!-- Поле: Название -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Название задачи</label>
                <input type="text" name="title" id="title" required value="{{ old('title') }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Поле: Описание -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Описание</label>
                <textarea name="description" id="description" rows="3" required
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Кнопка отправки формы -->
            <div class="flex justify-end mt-2">
                <button type="submit" style="background-color: #2563eb; color: white; padding: 10px 20px; font-weight: 500; border: none; border-radius: 8px; cursor: pointer; font-size: 14px;">
                    Добавить задачу
                </button>
            </div>
        </form>
    </div>

    <!-- БЛОК: Список текущих задач -->
    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Список текущих задач</h2>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        {{-- Проверка на наличие задач --}}
        @if($tasks->isEmpty())
            <p class="text-gray-500 text-sm">У вас пока нет задач. Создайте свою первую задачу выше!</p>
        @else
            <div class="flex flex-col gap-4">
                @foreach($tasks as $task)
                    <div class="p-5 border border-gray-200 rounded-lg bg-gray-50 hover:shadow-xs transition">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $task->title }}</h3>
                            
                            <!-- ФОРМА УДАЛЕНИЯ ЗАДАЧИ -->
                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" onsubmit="return confirm('Вы уверены, что хотите удалить эту задачу?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: #ef4444; color: white; padding: 4px 10px; border: none; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 500;">
                                    Удалить
                                </button>
                            </form>
                        </div>
                        
                        <p class="text-gray-600 text-sm leading-relaxed mb-3">{{ $task->description }}</p>
                        <small class="text-gray-400 text-xs block">
                            Создано: {{ $task->created_at->format('d.m.Y H:i') }}
                        </small>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection

