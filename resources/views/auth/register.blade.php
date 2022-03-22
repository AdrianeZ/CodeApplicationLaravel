@extends('layouts.main')

@section('content')

        <section class="register">
            <form action="#" method="post" class="register__form">

                <label for="login" class="register__label"> Podaj nazwę użytkownika/login</label>
                <div class="register__group">
                    <i class="fas fa-user fa-custom"></i>
                    <input placeholder="Login" type="text" name="login" class="register__login">
                </div>


                <label for="email" class="register__label"> Podaj email</label>
                <div class="register__group">
                    <i class="fas fa-at fa-custom"></i>
                    <input placeholder="Email" type="email" name="email" class="register__email">
                </div>


                <label for="password" class="register__label"> Podaj Hasło</label>
                <div class="register__group">
                    <i class="fas fa-key fa-custom"></i>
                    <input placeholder="Password" type="password" name="password" class="register__password">
                </div>


                <label for="password2" class="register__label"> Powtórz Hasło</label>
                <div class="register__group">
                    <i class="fas fa-key fa-custom"></i>
                    <input placeholder="Confirm Password" type="password" name="password2" class="register__password">
                </div>

                <button class="register__submit" type="submit">REGISTER</button>
            </form>
        </section>
@endsection
