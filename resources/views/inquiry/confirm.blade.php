@extends('layouts.app')

@section('content')
<h1>確認画面</h1>

<form method="POST" action="{{ route('inquiry.store') }}">
    @csrf

    <p>お名前：{{ $name }}</p>
    <p>メール：{{ $email }}</p>
    <p>内容：</p>
    <p>{!! nl2br(e($message)) !!}</p>

    <input type="hidden" name="name" value="{{ $name }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="hidden" name="message" value="{{ $message }}">

    <button type="submit">送信</button>
    <a href="{{ url()->previous() }}">戻る</a>
</form>
@endsection

