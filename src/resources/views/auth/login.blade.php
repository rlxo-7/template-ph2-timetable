<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>

    <form action="{{ url('/login') }}" method="POST">
        @csrf

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

        <button type="submit">ログイン</button>
    </form>

    <p><a href="{{ url('/register') }}">新規登録はこちら</a></p>
</body>
</html>