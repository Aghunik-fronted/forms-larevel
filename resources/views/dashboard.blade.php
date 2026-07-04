<div style="max-width: 600px; margin: 40px auto; font-family: sans-serif; padding: 20px;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Мои задачи</h2>
        <!-- Кнопка Выхода -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background: #f44336; color: white; border: none; padding: 8px 15px; cursor: pointer; border-radius: 4px;">Выйти</button>
        </form>
    </div>

    @if($tasks->isEmpty())
        <p style="color: #666;">У вас пока нет задач.</p>
    @else
        <div style="display: flex; flex-direction: column; gap: 15px;">
            @foreach($tasks as $task)
                <div style="padding: 15px; border: 1px solid #ddd; border-radius: 8px; background: #f9f9f9;">
                    <h3 style="margin: 0 0 10px 0; color: #333;">{{ $task->title }}</h3>
                    <p style="margin: 0; color: #666; font-size: 14px; line-height: 1.5;">{{ $task->description }}</p>
                    <small style="color: #999; display: block; margin-top: 10px;">Создано: {{ $task->created_at->format('d.m.Y H:i') }}</small>
                </div>
            @endforeach
        </div>
    @endif
</div>

