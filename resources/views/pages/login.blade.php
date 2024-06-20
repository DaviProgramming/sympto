@extends('layout')

@section('pagina', 'Login')


@section('head-content')

<meta name="csrf-token" content="{{ csrf_token() }}">

@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/main.scss', 'resources/js/scriptLogin.js'])

@endsection


@section('content')


<section class="container login">

    <div class="container-form">

        <div class="container-form-loadings hide-content">

            <span class="loader hide-content"></span>
            <div class="success-checkmark hide-content">
                <div class="check-icon">
                  <span class="icon-line line-tip"></span>
                  <span class="icon-line line-long"></span>
                  <div class="icon-circle"></div>
                  <div class="icon-fix"></div>
                </div>
            </div>
            <div class="error hide-content">
                <div class="error-container">
                    <i class="fa-solid fa-exclamation"></i>
                </div>
                <span>Erro aqui</span>
            </div>

        </div>

        <div class="container-form-container">
    
            <div class="container-form-container-logo">
                <img src="assets/logo-without-text.png" alt="">
            </div>

            <div class="container-form-container-input ">
                <input type="text" name="login">
                <span><i class="fa-solid fa-user"></i> Login</span>
            </div>

            <span class="error-info login hide-content"><i class="fa-solid fa-circle-exclamation"></i> Login invalido</span>

            <div class="container-form-container-input">
                <input type="password" name="password">
                <span><i class="fa-solid fa-lock"></i> Senha</span>
            </div>

            <span class="error-info password hide-content"><i class="fa-solid fa-circle-exclamation"></i> A senha deve conter pelo menos 5 caracteres</span>


            <button type="submit" class="container-form-container-button"><span>Login</span></button>
        </div>

    </div>

    
</section>


<footer class="footer-login">

    © 2024 Sympto

</footer>


@endsection




@section('scripts')


<script>

    function teste(){
        console.log('teste')


        return false;   
    }

</script>


@endsection


