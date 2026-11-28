<!-- filepath: c:\Users\riyk1\template-ph2-timetable\src\resources\views\auth\register.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
</head>
<body>
    <h1>ユーザー登録</h1>

    <form action="{{ url('/register') }}" method="POST">
        @csrf

        <div>
            <label for="name">名前</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}">
            @error('name')
                <p role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email">メールアドレス</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}">
            @error('email')
                <p role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">パスワード</label>
            <input id="password" name="password" type="password">
            @error('password')
                <p role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">パスワード（確認）</label>
            <input id="password_confirmation" name="password_confirmation" type="password">
        </div>

        <button type="submit">登録</button>
    </form>
</body>
</html>