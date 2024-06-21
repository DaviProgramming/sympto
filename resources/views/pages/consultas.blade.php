@extends('layout')

@section('pagina', 'Nova Consulta')

@section('head-content')

<meta name="csrf-token" content="{{ csrf_token() }}">

@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/main.scss'])

@endsection


@section('content')

@include('./components/aside')

<section class="container-consulta consultas">

    <div class="container-consulta-title">
        Nova consulta
    </div>

    <div class="container-consulta-content">


        
    </div>


</section>


@include('./components/footer')



@endsection