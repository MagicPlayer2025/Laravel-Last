@extends('layouts.app')

@section('content')
    <div class="space-between">
        <div>
            <h1>Редактирование услуги</h1>
            <p class="muted">Измените информацию об услуге велосервиса.</p>
        </div>
        <a class="btn btn-ghost" href="{{ route('admin.services.index') }}">Назад</a>
    </div>

    <div class="card mt" style="max-width: 760px;">
        <form method="POST" action="{{ route('admin.services.update', $service) }}">
            @csrf
            @method('PUT')
            <div class="field">
                <label for="name">Название</label>
                <input id="name" name="name" type="text" value="{{ old('name', $service->name) }}" required>
            </div>
            <div class="field">
                <label for="description">Описание</label>
                <textarea id="description" name="description" rows="4">{{ old('description', $service->description) }}</textarea>
            </div>
            <div class="field" style="max-width: 240px;">
                <label for="price">Цена (₽, можно оставить пустым)</label>
                <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price', $service->price) }}">
            </div>
            <button class="btn btn-primary" type="submit">Сохранить изменения</button>
        </form>
    </div>
@endsection



