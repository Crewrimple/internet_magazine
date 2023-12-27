@extends('welcome')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 p-3">
                <h2 class="text-center mb-4">Все товары для покупки</h2>
                <div class="row mb-2">
                    @php
                       
                       $staticProducts = [
                            [
                                'id' => 1,
                                'name' => 'Товар 1',
                                'description' => 'Описание товара 1',
                                'price' => '1300',  
                                'photo' => 'assets/img/1.jpg'
                            ],
                            [
                                'id' => 2,
                                'name' => 'Товар 2',
                                'description' => 'Описание товара 2',
                                'price' => '2300',
                                'photo' => 'path/to/photo2.jpg'
                            ],
                            [
                                'id' => 3,
                                'name' => 'Товар 3',
                                'description' => 'Описание товара 3',
                                'price' => '2100',
                                'photo' => 'path/to/photo2.jpg'
                            ],
                            [
                                'id' => 4,
                                'name' => 'Товар 4',
                                'description' => 'Описание товара 4',
                                'price' => '2200',
                                'photo' => 'path/to/photo2.jpg'
                            ],
                            [
                                'id' => 5,
                                'name' => 'Товар 5',
                                'description' => 'Описание товара 5',
                                'price' => '2200',
                                'photo' => 'path/to/photo2.jpg'
                            ],
                            [
                                'id' => 6,
                                'name' => 'Товар 6',
                                'description' => 'Описание товара 6',
                                'price' => '2500',
                                'photo' => 'path/to/photo2.jpg'
                ],
                            [
                                'id' => 7,
                                'name' => 'Товар 7',
                                'description' => 'Описание товара 7',
                                'price' => '2800',
                                'photo' => 'path/to/photo2.jpg'
                ],
                            [
                                'id' => 8,
                                'name' => 'Товар 8',
                                'description' => 'Описание товара 8',
                                'price' => '2900',
                                'photo' => 'path/to/photo2.jpg'
                ],
                        
                        ];
             
                    @endphp

                    @foreach($staticProducts as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3 mt-2">
                            <div class="card h-100 shadow-sm">
                                <img src="/storage/{{ $product['photo'] }}" class="card-img-top" alt="{{ $product['name'] }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $product['name'] }}</h5>
                                    <p class="card-text">{{ $product['description'] }}</p>
                                    <p class="card-text font-weight-bold">Стоимость: {{ $product['price'] }} ₽</p>
                                    <a href="{{ route('product', ['product' => $product['id']]) }}" class="btn btn-primary mt-auto">Посмотреть</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection



                       
                   