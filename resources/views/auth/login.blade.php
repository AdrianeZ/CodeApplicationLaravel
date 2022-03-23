@extends('layouts.main')

@section('content')
    <section class="login">
        <form method="POST" action="{{route("login")}}" class="login__form">
            @csrf

            <label for="login" class="login__label"> Podaj Email</label>
            <div class="login__group">
                <i class="fas fa-at fa-custom"></i>
                <input placeholder="email" type="text" name="email" class="login__login">
            </div>


            <label for="password" class="login__label"> Podaj Hasło</label>
            <div class="login__group">
                <i class="fas fa-key fa-custom"></i>
                <input placeholder="Password" type="password" name="password" class="login__password">
            </div>

            @if($errors->any())
                <small class="input-error">Invalid Email or Password</small>
            @endif

            <button class="login__submit" type="submit">LOGIN</button>
        </form>
    </section>
@endsection
