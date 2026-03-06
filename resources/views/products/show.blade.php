@extends('layouts.app')

@section('content')
    <div class="product-hero card">
        <div>
            <img class="product-img" style="height: 240px;" src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1509395176047-4a66953fd231?w=800&auto=format&fit=crop' }}" alt="{{ $product->name }}">
        </div>
        <div class="stack" style="gap: 6px;">
            <div class="badge">В наличии: {{ $product->stock }}</div>
            <h1 style="margin-bottom: 4px;">{{ $product->name }}</h1>
            <p class="muted" style="margin-bottom: 8px; line-height: 1.4;">{{ $product->description }}</p>
            <div class="price" style="font-size: 22px; margin: 8px 0 6px 0;">{{ number_format($product->price, 2, ',', ' ') }} ₽</div>
            @auth
                <form method="POST" action="{{ route('cart.add', $product) }}" class="flex" style="margin-top: 4px;">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" style="width: 100px;">
                    <button class="btn btn-primary" type="submit">Добавить в корзину</button>
                </form>
            @else
                <a class="btn btn-primary" href="{{ route('login') }}" style="margin-top: 4px;">Войдите, чтобы добавить в корзину</a>
            @endauth
        </div>
    </div>

    <div class="card mt">
        <h2>Отзывы</h2>

        @if($avgRating)
            <p class="muted">Средняя оценка: <strong>{{ number_format($avgRating, 1, ',', ' ') }}</strong> из 5</p>
        @endif

        @auth
            <form method="POST" action="{{ route('products.reviews.store', $product) }}" class="mt stack">
                @csrf
                <div class="flex">
                    <div class="field" style="max-width: 140px;">
                        <label for="rating">Оценка</label>
                        <select id="rating" name="rating" class="field-select">
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="comment">Комментарий</label>
                    <textarea id="comment" name="comment" rows="3" placeholder="Поделитесь впечатлениями о товаре"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Оставить отзыв</button>
            </form>
        @else
            <p class="muted mt">Войдите, чтобы оставить отзыв.</p>
        @endauth

        <div class="mt stack">
            @forelse($reviews as $review)
                <div>
                    <div class="space-between">
                        <strong>{{ $review->user->name }}</strong>
                        <span class="badge">Оценка: {{ $review->rating }}/5</span>
                    </div>
                    @if($review->comment)
                        <p class="muted">{{ $review->comment }}</p>
                    @endif
                    <p class="muted" style="font-size: 12px;">{{ $review->created_at->format('d.m.Y H:i') }}</p>
                    <div class="divider"></div>
                </div>
            @empty
                <p class="muted mt">Пока нет отзывов. Будьте первым!</p>
            @endforelse
        </div>
    </div>
@endsection

