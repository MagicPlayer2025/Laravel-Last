@extends('layouts.app')

@section('content')
    <div class="space-between">
        <div>
            <h1>Управление услугами</h1>
            <p class="muted">Админка: добавляйте и удаляйте услуги сервиса.</p>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.services.create') }}">Добавить услугу</a>
    </div>

    <div class="card mt">
        @if($services->isEmpty())
            Услуг пока нет.
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Цена</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>
                                @if(!is_null($service->price))
                                    {{ number_format($service->price, 2, ',', ' ') }} ₽
                                @else
                                    <span class="muted">по запросу</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <div class="flex" style="justify-content: flex-end;">
                                    <a class="btn btn-ghost" href="{{ route('admin.services.edit', $service) }}">Редактировать</a>
                                    <form method="POST" action="{{ route('admin.services.destroy', $service) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-ghost" type="submit">Удалить</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt">
                {{ $services->links() }}
            </div>
        @endif
    </div>
@endsection


