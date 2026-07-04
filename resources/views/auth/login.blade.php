<div style="max-width: 400px; margin: 50px auto; font-family: sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
    <h2>Войти в систему</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">{{ $errors->first() }}</div>
        @endif

        <div style="margin-bottom: 15px;">
            <label for="email">Email (Электронная почта):</label><br>
            <!-- ИСПРАВЛЕНО: :value="old('email')" заменено на value="{{ old('email') }}" -->
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password">Пароль:</label><br>
            <input id="password" type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label><input type="checkbox" name="remember"> Запомнить меня</label>
        </div>

        <button type="submit" style="padding: 10px 20px; background: #4CAF50; color: white; border: none; cursor: pointer; width: 100%; font-size: 16px;">
            Войти
        </button>
    </form>
</div>
