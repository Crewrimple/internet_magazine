@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1>Авторизация пользователя</h1>
                @auth
                    <div class="alert alert-success">Вы успешно авторизованы.</div>
                @endauth
                @guest
                    @error('auth')
                        <div class="alert alert-danger">Логин или пароль не верный</div>
                    @enderror
                    @if(session()->has('register'))
                        <div class="alert alert-primary">Вы успешно зарегистрированы, авторизуйтесь!</div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="inputLogin" class="form-label">Логин:</label>
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="inputLogin" aria-describedby="invalidLoginFeedback" value="{{ old('login') }}">
                            @error('login') <div id="invalidLoginFeedback" class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Пароль:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" aria-describedby="invalidPasswordFeedback">
                            @error('password') <div id="invalidPasswordFeedback" class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Авторизация</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
