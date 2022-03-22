@extends('layouts.main')

@section('content')
        <section class="login">
            <p class="login__info">Zaloguj się</p>
            <form method="post" action="/user/login" class="login__form">

                <label for="login" class="login__label"> Podaj nazwę użytkownika/login</label>
                <div class="login__group">
                    <i class="fas fa-user fa-custom"></i>
                    <input placeholder="Login" type="text" name="login" class="login__login">
                </div>


                <label for="password" class="login__label"> Podaj Hasło</label>
                <div class="login__group">
                    <i class="fas fa-key fa-custom"></i>
                    <input placeholder="Password" type="password" name="password" class="login__password">
                </div>


                <button class="login__submit" type="submit">LOGIN</button>
            </form>
        </section>
@endsection
