<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>お問い合わせ</title>
</head>
<body>

@extends('layouts.app')

@section('title', 'お問い合わせ')

@section('content')
    <h1>お問い合わせ</h1>

    @if ($errors->any())
        <p class="error">入力内容にエラーがあります。</p>
    @endif

    <form method="POST" action="{{ route('inquiry.store') }}">
        @csrf

        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror
        <div>
            名前<br>
            <input type="text" name="name" class="{{ $errors->has('name') ? 'input-error' : '' }}" value="{{ old('name') }}">
        </div>

        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror
        <div>
            メール<br>
            <input type="email" name="email" class="{{ $errors->has('email') ? 'input-error' : '' }}" value="{{ old('email') }}">
        </div>

        @error('message')
            <p class="error">{{ $message }}</p>
        @enderror
        <div>
            内容<br>
            <textarea name="message" class="{{ $errors->has('message') ? 'input-error' : '' }}">{{ old('message') }}</textarea>
        </div>

        <button type="submit">送信</button>
    </form>

@endsection
