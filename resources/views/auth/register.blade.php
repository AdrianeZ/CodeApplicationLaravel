@extends('layouts.main')

@section('content')

    <section class="register">
        <form action="{{route("register")}}" method="post" class="register__form">
            @csrf
            <label for="login" class="register__label"> Podaj Swoje Imię/login</label>
            <div class="register__group">
                <i class="fas fa-user fa-custom"></i>
                <input placeholder="Name" type="text" name="name" id="login" value="{{old("name")}}"
                       class="register__login @error('name') is-invalid @enderror" required>
                @error('name') <small class="input-error">{{$message}}</small> @enderror
            </div>


            <label for="email" class="register__label"> Podaj email</label>
            <div class="register__group">
                <i class="fas fa-at fa-custom"></i>
                <input placeholder="Email" type="email" name="email" id="email" value="{{old("email")}}"
                       class="register__email @error('email') is-invalid @enderror" required>
                @error('email') <small class="input-error">{{$message}}</small> @enderror
            </div>


            <label for="password" class="register__label"> Podaj Hasło</label>
            <div class="register__group">
                <i class="fas fa-key fa-custom"></i>
                <input placeholder="Password" type="password" name="password" id="password"
                       class="register__password @error('password') is-invalid @enderror" required>
                @error('password') <small class="input-error">{{$message}}</small> @enderror
            </div>


            <label for="password_confirmation" class="register__label"> Powtórz Hasło</label>
            <div class="register__group">
                <i class="fas fa-key fa-custom"></i>
                <input placeholder="Confirm Password" type="password" name="password_confirmation"
                       class="register__password" id="password_confirmation" required>
            </div>

            <button class="register__submit" type="submit">REGISTER</button>
        </form>
    </section>
@endsection
