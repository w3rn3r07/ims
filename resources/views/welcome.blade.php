@extends('layouts.welcomeLayout')
@section('content')
<header>
    <div class="headerlinks">
        <a href="">About</a>
        <a href="">Demo</a>
        <a href="">Contact</a>
        <a href="">Settings</a>
        <div class="signinlink">
            <button class="signinbutton">LogIn/Register</button>
            <div class="signinoptions">
                <a id="login" href="{{ route('login') }}">Login</a>
                <a id="register" href="{{ route('register-staffdetails') }}">Register</a>
            </div>
        </div>
    </div>
</header>
<h1 style="color: red; position:absolute; top:50%; left: 50%; transform: translate(-50%, -50%); font-size:30px">Inventory Management System Application</h1>
<!-- <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" /> -->
@endsection