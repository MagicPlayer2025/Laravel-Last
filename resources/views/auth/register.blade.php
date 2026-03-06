@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 520px; margin: 0 auto;">
        <h2>Регистрация</h2>
        <p class="muted">Создайте аккаунт, чтобы оформлять заказы.</p>
        <form method="POST" action="{{ route('register') }}" class="mt">
            @csrf
            <div class="field">
                <label for="name">Имя</label>
                <input id="name" name="name" type="text" required value="{{ old('name') }}">
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" required value="{{ old('email') }}">
            </div>
            <div class="field">
                <label for="password">Пароль</label>
                <input id="password" name="password" type="password" required>
            </div>
            <div class="field">
                <label for="password_confirmation">Повторите пароль</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required>
            </div>
            <button class="btn btn-primary" type="submit" style="width: 100%;">Зарегистрироваться</button>
        </form>
    </div>
@endsection

