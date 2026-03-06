@extends('layouts.app')

@section('content')
    <div class="space-between">
        <div>
            <h1>Новый товар</h1>
            <p class="muted">Заполните информацию о велосипеде или запчасти.</p>
        </div>
        <a class="btn btn-ghost" href="{{ route('admin.products.index') }}">Назад</a>
    </div>

    <div class="card mt" style="max-width: 760px;">
        <form method="POST" action="{{ route('admin.products.store') }}">
            @csrf
            <div class="field">
                <label for="name">Название</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required>
            </div>
            <div class="field">
                <label for="description">Описание</label>
                <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
            </div>
            <div class="flex">
                <div class="field" style="flex:1;">
                    <label for="price">Цена (₽)</label>
                    <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price', 0) }}" required>
                </div>
                <div class="field" style="flex:1;">
                    <label for="stock">Количество на складе</label>
                    <input id="stock" name="stock" type="number" min="0" value="{{ old('stock', 0) }}" required>
                </div>
            </div>
            <div class="field">
                <label for="image_url">Ссылка на фото</label>
                <input id="image_url" name="image_url" type="url" value="{{ old('image_url') }}">
            </div>
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </form>
    </div>
@endsection

