<div style="max-width: 400px; margin: 50px auto; font-family: sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
    <h2>Регистрация нового пользователя</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">{{ $errors->first() }}</div>
        @endif

        <!-- Name -->
        <div style="margin-bottom: 15px;">
            <label for="name">Имя:</label><br>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>

        <!-- Email Address -->
        <div style="margin-bottom: 15px;">
            <label for="email">Email (Электронная почта):</label><br>
            <input id="email" type="email" name="email" :value="old('email')" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>

        <!-- Password -->
        <div style="margin-bottom: 15px;">
            <label for="password">Пароль:</label><br>
            <input id="password" type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom: 15px;">
            <label for="password_confirmation">Подтвердите пароль:</label><br>
            <input id="password_confirmation" type="password" name="password_confirmation" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>

        <div style="margin-bottom: 15px; text-align: right;">
            <a href="{{ route('login') }}" style="font-size: 14px; color: #666; text-decoration: underline; margin-right: 15px;">Уже зарегистрированы?</a>
            <button type="submit" style="padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer; font-size: 16px;">
                Зарегистрироваться
            </button>
        </div>
    </form>
</div>
