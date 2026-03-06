@extends('layouts.app')

@section('content')
    <div class="space-between">
        <div>
            <h1>Управление товарами</h1>
            <p class="muted">Админка: добавляйте, удаляйте и смотрите наличие.</p>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.products.create') }}">Добавить товар</a>
    </div>

    <div class="card mt">
        @if($products->isEmpty())
            Товаров пока нет.
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Наличие</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 2, ',', ' ') }} ₽</td>
                            <td>{{ $product->stock }}</td>
                            <td class="text-right">
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-ghost" type="submit">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@endsection

