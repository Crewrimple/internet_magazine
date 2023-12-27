@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h1>Редактирование аккаунта</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success">Аккаунт успешно отредактирован!</div>
                @endif
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="inputFullame" class="form-label">ФИО:</label>
                        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="inputFullname" placeholder="Фамилия Имя Отчество" aria-describedby="invalidInputFullame" value="{{ Auth::user()->fullname }}">
                        @error('fullname') <div id="invalidInputFullame" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                  
                    <p class="small">При не вводе пароля, изменения его не коснутся.</p>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Пароль:</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" placeholder="Пароль:" aria-describedby="invalidInputPassword">
                        @error('password') <div id="invalidInputPassword" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPasswordConfirmation" class="form-label">Повтор пароля:</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="inputPasswordConfirmation" placeholder="Повтор пароля:">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Редактировать аккаунт
                    </button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
