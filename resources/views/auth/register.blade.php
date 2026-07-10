<div style="max-width: 400px; margin: 50px auto; font-family: sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background: #ffffff; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
    <h2 style="margin-top: 0; margin-bottom: 20px; color: #333; text-align: center;">Регистрация нового пользователя</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Блок вывода ошибок -->
        @if ($errors->any())
            <div style="color: #dc3545; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-size: 14px;">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Name (Имя) -->
        <div style="margin-bottom: 15px;">
            <label for="name" style="font-weight: 600; color: #495057;">Имя:</label><br>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <!-- Email Address (Почта) -->
        <div style="margin-bottom: 15px;">
            <label for="email" style="font-weight: 600; color: #495057;">Email (Электронная почта):</label><br>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <!-- Password (Пароль) -->
        <div style="margin-bottom: 15px;">
            <label for="password" style="font-weight: 600; color: #495057;">Пароль:</label><br>
            <input id="password" type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <!-- Confirm Password (Подтверждение) -->
        <div style="margin-bottom: 20px;">
            <label for="password_confirmation" style="font-weight: 600; color: #495057;">Подтвердите пароль:</label><br>
            <input id="password_confirmation" type="password" name="password_confirmation" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <!-- Кнопки действий -->
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('login') }}" style="font-size: 14px; color: #007bff; text-decoration: underline;">Уже зарегистрированы?</a>
            <button type="submit" style="padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; font-weight: 600;">
                Зарегистрироваться
            </button>
        </div>
    </form>
</div>
