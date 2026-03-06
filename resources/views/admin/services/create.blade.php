@extends('layouts.app')

@section('content')
    <div class="space-between">
        <div>
            <h1>Новая услуга</h1>
            <p class="muted">Опишите услугу велосервиса и её стоимость.</p>
        </div>
        <a class="btn btn-ghost" href="{{ route('admin.services.index') }}">Назад</a>
    </div>

    <div class="card mt" style="max-width: 760px;">
        <form method="POST" action="{{ route('admin.services.store') }}">
            @csrf
            <div class="field">
                <label for="name">Название</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required>
            </div>
            <div class="field">
                <label for="description">Описание</label>
                <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
            </div>
            <div class="field" style="max-width: 240px;">
                <label for="price">Цена (₽, можно оставить пустым)</label>
                <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price') }}">
            </div>
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </form>
    </div>
@endsection



