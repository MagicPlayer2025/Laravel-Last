@extends('layouts.app')

@section('content')
    <div class="space-between">
        <div>
            <h1>Велосипеды и запчасти</h1>
            <p class="muted">Каталог для любителей велопрогулок и спорта.</p>
        </div>
        @auth
            <a class="btn btn-primary" href="{{ route('cart.index') }}">Перейти в корзину</a>
        @endauth
    </div>

    @if($products->count() === 0)
        <div class="card mt">Пока нет товаров. Добавьте их в админке.</div>
    @else
        <div class="grid mt">
            @foreach ($products as $product)
                <div class="card product-card">
                    <img class="product-img" src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1509395176047-4a66953fd231?w=800&auto=format&fit=crop' }}" alt="{{ $product->name }}">
                    <div class="badge">В наличии: {{ $product->stock }}</div>
                    <h3>{{ $product->name }}</h3>
                    <p class="muted" style="min-height: 40px;">{{ \Illuminate\Support\Str::limit($product->description, 120) }}</p>
                    <div class="space-between">
                        <span class="price">{{ number_format($product->price, 2, ',', ' ') }} ₽</span>
                        <a class="btn btn-ghost" href="{{ route('products.show', $product) }}">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
        @if($products->hasPages())
            <div class="mt text-center">
                <div class="flex" style="justify-content: center;">
                    @if($products->onFirstPage())
                        <span class="muted">« Назад</span>
                    @else
                        <a class="btn btn-ghost" href="{{ $products->previousPageUrl() }}">« Назад</a>
                    @endif

                    <span class="muted">Страница {{ $products->currentPage() }} из {{ $products->lastPage() }}</span>

                    @if($products->hasMorePages())
                        <a class="btn btn-ghost" href="{{ $products->nextPageUrl() }}">Вперёд »</a>
                    @else
                        <span class="muted">Вперёд »</span>
                    @endif
                </div>
            </div>
        @endif
    @endif
@endsection

