@extends('layout')

@section('pagina', 'Inicio')


@section('head-content')

<meta name="csrf-token" content="{{ csrf_token() }}">

@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/main.scss', 'resources/js/scriptDashboard.js'])

@endsection


@section('content')

@include('../components/aside')

<footer class="footer-login">

    © 2024 Sympto

</footer>



@endsection




@section('scripts')




@endsection


