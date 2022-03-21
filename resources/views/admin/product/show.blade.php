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
                        <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}" class="btn btn-primary">Редактировать</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Удалить
                        </button>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Удалить товар {{ $product->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы точно хотите удалить товар?<br>
                    {{ $product->name }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <form action="{{ route('admin.product.destroy', ['product' => $product->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-danger">Да я точно хочу удалить данный товар!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
