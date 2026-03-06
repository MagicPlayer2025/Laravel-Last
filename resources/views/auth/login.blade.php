@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 520px; margin: 0 auto;">
        <h2>Вход</h2>
        <p class="muted">Введите email и пароль, чтобы войти.</p>
        <form method="POST" action="{{ route('login') }}" class="mt">
            @csrf
            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" required value="{{ old('email') }}">
            </div>
            <div class="field">
                <label for="password">Пароль</label>
                <input id="password" name="password" type="password" required>
            </div>
            <div class="field">
                <label class="flex" style="gap:6px;">
                    <input type="checkbox" name="remember" value="1" style="width:16px;height:16px;">
                    <span class="muted">Запомнить меня</span>
                </label>
            </div>
            <button class="btn btn-primary" type="submit" style="width: 100%;">Войти</button>
        </form>
    </div>
@endsection

