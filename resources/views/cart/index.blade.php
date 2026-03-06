@extends('layouts.app')

@section('content')
    <div class="space-between">
        <div>
            <h1>Корзина</h1>
            <p class="muted">Товары, которые вы планируете купить.</p>
        </div>
        <a class="btn btn-ghost" href="{{ route('home') }}">Продолжить покупки</a>
    </div>

    @if ($items->isEmpty())
        <div class="card mt">Корзина пуста.</div>
    @else
        <div class="card mt">
            <table class="table">
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Цена</th>
                        <th>Кол-во</th>
                        <th>Сумма</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="stack" style="gap:4px;">
                                    <strong>{{ $item->product->name }}</strong>
                                    <span class="muted">{{ \Illuminate\Support\Str::limit($item->product->description, 60) }}</span>
                                </div>
                            </td>
                            <td>{{ number_format($item->product->price, 2, ',', ' ') }} ₽</td>
                            <td>
                                <form method="POST" action="{{ route('cart.update', $item) }}" class="flex">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width:80px;">
                                    <button class="btn btn-ghost" type="submit">Обновить</button>
                                </form>
                            </td>
                            <td>{{ number_format($item->product->price * $item->quantity, 2, ',', ' ') }} ₽</td>
                            <td class="text-right">
                                <form method="POST" action="{{ route('cart.remove', $item) }}">
                                    @csrf
                                    <button class="btn btn-ghost" type="submit">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="space-between mt">
                <div class="muted">Итого:</div>
                <div class="price" style="font-size: 22px;">{{ number_format($total, 2, ',', ' ') }} ₽</div>
            </div>
        </div>
    @endif
@endsection

