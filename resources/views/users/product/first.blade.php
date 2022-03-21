@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @include('breadcrumb', $breadcrumbs)
                <div class="card mt-2">
                    <div class="card-header">
                        {{ $product->name }}
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ '/storage/' . $product->photo }}" class="card-img-top w-50" alt="{{ $product->name }}">
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Стоимость товара: {{ $product->price }}</p>
                        <p class="card-text">Страна производства: {{ $product->made }}</p>
                        @auth
                            @if(session()->has('basket'))
                                @if(isset(session('basket')[$product->id]))
                                    <a href="{{ route('order.basket') }}" class="btn btn-primary" type="button">Перейти в корзину</a>
                                @else
                                    <a href="{{ route('order.addBasket', ['productId' => $product->id]) }}" class="btn btn-success" type="button">Добавить в корзину</a>
                                @endif
                            @else
                                <a href="{{ route('order.addBasket', ['productId' => $product->id]) }}" class="btn btn-success" type="button">Добавить в корзину</a>
                            @endif
                        @endauth

                        @guest
                            <p class="alert alert-light">Для добавление в корзину <a href="{{ route('login') }}">Авторизуйтесь</a>.</p>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
