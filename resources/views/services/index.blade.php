@extends('layouts.app')

@section('content')
    <div class="space-between">
        <div>
            <h1>Наши услуги</h1>
            <p class="muted">Профессиональное обслуживание и настройка вашего велосипеда.</p>
        </div>
    </div>

    @if($services->isEmpty())
        <div class="card mt">Пока нет услуг. Добавьте их в базе.</div>
    @else
        <div class="card mt">
            <div class="stack">
                @foreach($services as $service)
                    <div>
                        <div class="space-between">
                            <h3>{{ $service->name }}</h3>
                            @if($service->price !== null)
                                <span class="price">{{ number_format($service->price, 2, ',', ' ') }} ₽</span>
                            @endif
                        </div>
                        @if($service->description)
                            <p class="muted">{{ $service->description }}</p>
                        @endif
                        <div class="divider"></div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection



