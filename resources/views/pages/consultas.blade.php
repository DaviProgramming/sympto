@extends('layout')

@section('pagina', 'Consulta')

@section('head-content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr@4.6.13/dist/l10n/pt.js"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/main.scss', 'resources/js/scriptConsultas.js'])

@endsection


@section('content')

    @include('./components/aside')

    <section class="container-consulta consultas">

        <div class="container-consulta-title">
            Nova consulta
        </div>

        <div class="container-consulta-content">

            <div class="container-consulta-content-form first-step">

                <div class="container-consulta-content-form-content">

                    <div class="container-consulta-content-form-content-title">
                        Selecione o que está sentindo
                    </div>
                    <div class="container-consulta-content-form-content-body">

                        <div class="container-consulta-content-form-content-body-container">
                            <span>Quais os sintomas?</span>
                            <div class="select-dropdown">
                                <div class="select-dropdown-header">
                                    <input type="text" id="input-search-sintoma" placeholder='Pesquise os sintomas'>
                                </div>

                                <div class="select-dropdown-body">
                                    @foreach ($sintomas as $sintoma )
     
                                        <div class="select-dropdown-body-item" data-sintoma-id="{{$sintoma->id}}">{{$sintoma->name}}</div>
                                        
                                    @endforeach
                                  

                                </div>
                            </div>
                        </div>


                    </div>


                </div>

                <div class="container-consulta-content-form-sintomas">

                    <div class="container-consulta-content-form-sintomas-title">
                        Sintomas Selecionados
                    </div>

                    <div class="container-consulta-content-form-sintomas-body">

                        <div class="container-consulta-content-form-sintomas-body-empty">
                            <div class="container-consulta-content-form-sintomas-body-empty-image">
                                <img src="assets/sintoma.png" alt="">
                            </div>
                            <div class="container-consulta-content-form-sintomas-body-empty-text">
                                Nenhum sintoma selecionado ainda
                            </div>
                        </div>


                    </div>

                    <button class="btn-new-query"><span>Proxima Etapa <i
                                class="fa-solid fa-arrow-right"></i></span></button>


                </div>

            </div>

            <div class="container-consulta-content-form second-step hide-content">

               
                
               

                <div class="container-consulta-content-form-content">

                    <div class="container-consulta-content-form-content-title">
                        <div class="container-consulta-content-form-content-title-volta">
                            <i class="fa-solid fa-arrow-left"></i> 
                        </div>
                        Voltar
                    </div>
                    <div class="container-consulta-content-form-content-body">

                        <div class="container-consulta-content-form-content-body-container">
                            <span>Acrescente com suas palavras o que você está sentindo</span>
                            <textarea name="sentindo" id="" placeholder="Descreva os sintomas o mais detalhadamente possível"></textarea>
                        </div>

                        <button class="btn-new-query" id="btn-nova-consulta"><span>Proxima Etapa <i
                                    class="fa-solid fa-arrow-right"></i></span></button>
                    </div>


                </div>

                <div class="container-consulta-content-form-image">

                    <img src="assets/doctor-illustration.jpg" alt="">

                    <div class="container-consulta-content-form-image-alert">



                        <p>
                            Lembre-se de preencher bem detalhadamente cada campo.
                        </p>

                        <span>Cada detalhe importa!</span>
                    </div>
                </div>

            </div>

            

        </div>


    </section>


    @include('./components/footer')



@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const configFlatPickr = {
            enableTime: false,
            dateFormat: "d-m-Y H:i",
            altInput: true,
            locale: "pt"
        }

        flatpickr("input[type=datetime-local]", configFlatPickr);
    </script>

@endsection
