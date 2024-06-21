@extends('layout')

@section('pagina', 'Inicio')


@section('head-content')

<meta name="csrf-token" content="{{ csrf_token() }}">

@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/main.scss', 'resources/js/scriptDashboard.js'])

@endsection


@section('content')

@include('../components/aside')

<section class="container-dashboard">

    <div class="container-dashboard-title">
        Dashboard
    </div>

    <div class="container-dashboard-content">


        <div class="container-dashboard-content-primary">

            <div class="container-dashboard-content-primary-welcome">

                <div class="container-dashboard-content-primary-welcome-head">
                    <div class="container-dashboard-content-primary-welcome-head-text">Bom dia, <span class="container-dashboard-content-primary-welcome-head-name">David Oliveira</span> </div> 
                    <div class="container-dashboard-content-primary-welcome-head-sub-text">Como está hoje?</div>
                </div>

                <div class="container-dashboard-content-primary-welcome-body">

                    <button type="button">Ficar Online</button>

                </div>

            </div>

            <div class="container-dashboard-content-primary-cards">

                <div class="container-dashboard-content-primary-cards-card">

                    <div class="container-dashboard-content-primary-cards-card-title">
                        <i class="fa-solid fa-users"></i> Novos pacientes
                    </div>

                    <div class="container-dashboard-content-primary-cards-card-body">
                        4   
                    </div>


                </div>


                <div class="container-dashboard-content-primary-cards-card">

                    <div class="container-dashboard-content-primary-cards-card-title">
                        <i class="fa-solid fa-star"></i> Avaliação
                    </div>

                    <div class="container-dashboard-content-primary-cards-card-body">
                        4   
                    </div>


                </div>

                <div class="container-dashboard-content-primary-cards-card">

                    <div class="container-dashboard-content-primary-cards-card-title">
                        <i class="fa-solid fa-clipboard-check"></i> Consultas Totais
                    </div>

                    <div class="container-dashboard-content-primary-cards-card-body">
                        10
                    </div>


                </div>

                <div class="container-dashboard-content-primary-cards-card">

                    <div class="container-dashboard-content-primary-cards-card-title">
                        <i class="fa-solid fa-clock"></i> Tempo medio de consulta
                    </div>

                    <div class="container-dashboard-content-primary-cards-card-body">
                        10 min
                    </div>


                </div>

            </div>



        </div>


        <div class="container-dashboard-content-secondary">
            
        </div>


    </div>

    

    

</section>

@include('../components/footer')


@endsection




@section('scripts')




@endsection


