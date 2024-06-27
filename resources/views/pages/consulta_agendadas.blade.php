@extends('layout')

@section('pagina', 'Consulta')

@section('head-content')



@endsection

@section('content')

@include('./components/aside')

<section class="container-consulta consultas-listas">
    <div class="container-consulta-title">
        Consultas agendadas
    </div>
    <div class="container-consulta-content">
        
    </div>
</section>

@include('./components/footer')


@endsection