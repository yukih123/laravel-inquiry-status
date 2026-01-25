@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form method="POST" action="/inquiry">
    @csrf

    <input name="name" placeholder="名前" value="{{ old('name') }}">
    @error('name')<div>{{ $message }}</div>@enderror

    <input name="email" placeholder="メール" value="{{ old('email') }}">
    @error('email')<div>{{ $message }}</div>@enderror

    <textarea name="message">{{ old('message') }}</textarea>
    @error('message')<div>{{ $message }}</div>@enderror

    <button>送信</button>
</form>

