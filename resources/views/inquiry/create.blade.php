<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>お問い合わせ</title>
</head>
<body>
<h1>お問い合わせ</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('inquiry.store') }}">
    @csrf

    <div>
        名前<br>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        メール<br>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        内容<br>
        <textarea name="message">{{ old('message') }}</textarea>
    </div>

    <button type="submit">送信</button>
</form>
</body>
</html>

