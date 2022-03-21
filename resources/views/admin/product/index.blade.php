@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <h1>Все товары интернет магазина</h1>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-4">
                            <div class="card" style="width: 100%">
                                <img src="/storage/{{ $product->photo }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <a href="{{ route('admin.product.show', ['product' => $product->id]) }}" class="btn btn-primary">Посмотреть</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
