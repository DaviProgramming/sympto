@extends('layout')

@section('pagina', 'Consulta')

@section('head-content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr@4.6.13/dist/l10n/pt.js"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/main.scss'])

@endsection


@section('content')

    @include('./components/aside')

    <section class="container-consulta consultas">

        <div class="container-consulta-title">
            Nova consulta
        </div>

        <div class="container-consulta-content">

            <div class="container-consulta-content-form first-step ">

                <div class="container-consulta-content-form-content">

                    <div class="container-consulta-content-form-content-title">
                        Preencha os Dados da Consulta
                    </div>
                    <div class="container-consulta-content-form-content-body">

                        <div class="container-consulta-content-form-content-body-container">
                            <span>O que você está sentindo?</span>
                            <textarea name="sentindo" id="" placeholder="Descreva os sintomas o mais detalhadamente possível"></textarea>
                        </div>

                        <button class="btn-new-query"><span>Proxima Etapa <i
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

            <div class="container-consulta-content-form second-step hide-content">

                <div class="container-consulta-content-form-content">

                    <div class="container-consulta-content-form-content-title">
                        Selecione o que está sentindo
                    </div>
                    <div class="container-consulta-content-form-content-body">

                        <div class="container-consulta-content-form-content-body-container">
                            <span>Quais os sintomas?</span>
                            <div class="select-dropdown">
                                <div class="select-dropdown-header">
                                    <input type="text" placeholder='Selecione os sintomas'>
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

                        <div class="container-consulta-content-form-sintomas-body-item ">

                            <div class="container-consulta-content-form-sintomas-body-item-title">
                                Febre
                            </div>

                            <div class="container-consulta-content-form-sintomas-body-item-content">

                                <div class="container-consulta-content-form-sintomas-body-item-grau">
                                    <label for="grau-sintoma">Qual a intensidade?</label>
                                    <div class="range">
                                        <input type="range" id="range1" step="1" max="2" />
                                    </div>
                                    <span>Leve</span>
                                </div>
                                <div class="container-consulta-content-form-sintomas-body-item-tempo">
                                    <label for="tempo-sintoma">A quanto tempo está sentindo?</label>
                                    <input type="datetime-local" name="tempo-sintoma" id="tempo-input" min="2018-01-01">
                                </div>

                            </div>


                        </div>

                        <div class="container-consulta-content-form-sintomas-body-item hide-body">

                            <div class="container-consulta-content-form-sintomas-body-item-title">
                                Febre
                            </div>

                            <div class="container-consulta-content-form-sintomas-body-item-content">

                                <div class="container-consulta-content-form-sintomas-body-item-grau">
                                    <label for="grau-sintoma">Qual a intensidade?</label>
                                    <div class="range">
                                        <input type="range" id="range1" step="1" max="2" />
                                    </div>
                                    <span>Leve</span>
                                </div>
                                <div class="container-consulta-content-form-sintomas-body-item-tempo">
                                    <label for="tempo-sintoma">A quanto tempo está sentindo?</label>
                                    <input type="datetime-local" name="tempo-sintoma" id="tempo-input" min="2018-01-01">
                                </div>

                            </div>


                        </div>

                        <div class="container-consulta-content-form-sintomas-body-item hide-body">

                            <div class="container-consulta-content-form-sintomas-body-item-title">
                                Febre
                            </div>

                            <div class="container-consulta-content-form-sintomas-body-item-content">

                                <div class="container-consulta-content-form-sintomas-body-item-grau">
                                    <label for="grau-sintoma">Qual a intensidade?</label>
                                    <div class="range">
                                        <input type="range" id="range1" step="1" max="2" />
                                    </div>
                                    <span>Leve</span>
                                </div>
                                <div class="container-consulta-content-form-sintomas-body-item-tempo">
                                    <label for="tempo-sintoma">A quanto tempo está sentindo?</label>
                                    <input type="datetime-local" name="tempo-sintoma" id="tempo-input" min="2018-01-01">
                                </div>

                            </div>


                        </div>

                        <div class="container-consulta-content-form-sintomas-body-item hide-body">

                            <div class="container-consulta-content-form-sintomas-body-item-title">
                                Febre
                            </div>

                            <div class="container-consulta-content-form-sintomas-body-item-content">

                                <div class="container-consulta-content-form-sintomas-body-item-grau">
                                    <label for="grau-sintoma">Qual a intensidade?</label>
                                    <div class="range">
                                        <input type="range" id="range1" step="1" max="2" />
                                    </div>
                                    <span>Leve</span>
                                </div>
                                <div class="container-consulta-content-form-sintomas-body-item-tempo">
                                    <label for="tempo-sintoma">A quanto tempo está sentindo?</label>
                                    <input type="datetime-local" name="tempo-sintoma" id="tempo-input" min="2018-01-01">
                                </div>

                            </div>


                        </div>




                    </div>

                    <button class="btn-new-query"><span>Proxima Etapa <i
                                class="fa-solid fa-arrow-right"></i></span></button>


                </div>

            </div>

        </div>


    </section>


    @include('./components/footer')



@endsection


@section('scripts')


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
