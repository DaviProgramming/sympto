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

            <div class="container-consulta-content-form first-step hide-content">

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

            <div class="container-consulta-content-form second-step">

                <div class="container-consulta-content-form-content">

                    <div class="container-consulta-content-form-content-title">
                        Preencha os Dados da Consulta
                    </div>
                    <div class="container-consulta-content-form-content-body">

                        <div class="container-consulta-content-form-content-body-container">
                            <span>Quais os sintomas?</span>
                            <div class="select-dropdown">
                                <div class="select-dropdown-header">
                                    <input type="text" placeholder='Selecione os sintomas'>
                                </div>

                                <div class="select-dropdown-body">
                                    <div class="select-dropdown-body-item">Febre</div>
                                    <div class="select-dropdown-body-item">Dor de cabeça</div>
                                    <div class="select-dropdown-body-item">Náusea</div>
                                    <div class="select-dropdown-body-item">Fadiga</div>
                                    <div class="select-dropdown-body-item">Dor abdominal</div>
                                    <div class="select-dropdown-body-item">Tosse</div>
                                    <div class="select-dropdown-body-item">Dor de garganta</div>
                                    <div class="select-dropdown-body-item">Congestão nasal</div>
                                    <div class="select-dropdown-body-item">Diarreia</div>
                                    <div class="select-dropdown-body-item">Erupção cutânea</div>
                                    <div class="select-dropdown-body-item">Calafrios</div>
                                    <div class="select-dropdown-body-item">Falta de ar</div>
                                    <div class="select-dropdown-body-item">Tontura</div>
                                    <div class="select-dropdown-body-item">Perda de apetite</div>
                                    <div class="select-dropdown-body-item">Dores musculares</div>
                                    <div class="select-dropdown-body-item">Inchaço</div>
                                    <div class="select-dropdown-body-item">Palpitações</div>
                                    <div class="select-dropdown-body-item">Suores noturnos</div>
                                    <div class="select-dropdown-body-item">Visão embaçada</div>
                                    <div class="select-dropdown-body-item">Coceira</div>
                                    <div class="select-dropdown-body-item">Dor no peito</div>
                                    <div class="select-dropdown-body-item">Perda de olfato</div>
                                    <div class="select-dropdown-body-item">Perda de paladar</div>
                                    <div class="select-dropdown-body-item">Dificuldade para engolir</div>
                                    <div class="select-dropdown-body-item">Inchaço nas articulações</div>
                                    <div class="select-dropdown-body-item">Rouquidão</div>
                                    <div class="select-dropdown-body-item">Desmaio</div>
                                    <div class="select-dropdown-body-item">Dor nas costas</div>
                                    <div class="select-dropdown-body-item">Dor ao urinar</div>
                                    <div class="select-dropdown-body-item">Sangramento nasal</div>
                                    <div class="select-dropdown-body-item">Dor de dente</div>
                                    <div class="select-dropdown-body-item">Perda de peso inexplicada</div>
                                    <div class="select-dropdown-body-item">Pele amarelada</div>
                                    <div class="select-dropdown-body-item">Olhos vermelhos</div>
                                    <div class="select-dropdown-body-item">Vômito</div>
                                    <div class="select-dropdown-body-item">Aftas</div>
                                    <div class="select-dropdown-body-item">Urticária</div>
                                    <div class="select-dropdown-body-item">Dores articulares</div>
                                    <div class="select-dropdown-body-item">Zumbido no ouvido</div>
                                    <div class="select-dropdown-body-item">Tremores</div>
                                    <div class="select-dropdown-body-item">Confusão mental</div>
                                    <div class="select-dropdown-body-item">Dificuldade para respirar</div>
                                    <div class="select-dropdown-body-item">Inchaço nas pernas</div>
                                    <div class="select-dropdown-body-item">Fraqueza muscular</div>
                                    <div class="select-dropdown-body-item">Batimento cardíaco irregular</div>
                                    <div class="select-dropdown-body-item">Alterações de humor</div>
                                    <div class="select-dropdown-body-item">Hematomas fáceis</div>
                                    <div class="select-dropdown-body-item">Dor nos olhos</div>
                                    <div class="select-dropdown-body-item">Sensibilidade à luz</div>
                                    <div class="select-dropdown-body-item">Dificuldade para dormir</div>
                                    <div class="select-dropdown-body-item">Sensação de formigamento</div>
                                    <div class="select-dropdown-body-item">Cãibras</div>
                                    <div class="select-dropdown-body-item">Rigidez matinal</div>
                                    <div class="select-dropdown-body-item">Pele seca</div>
                                    <div class="select-dropdown-body-item">Excesso de suor</div>
                                    <div class="select-dropdown-body-item">Dificuldade para se concentrar</div>
                                    <div class="select-dropdown-body-item">Olhos secos</div>
                                    <div class="select-dropdown-body-item">Manchas na pele</div>
                                    <div class="select-dropdown-body-item">Problemas de equilíbrio</div>
                                    <div class="select-dropdown-body-item">Dificuldade de fala</div>

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
                                    <input type="range" id="range1" step="1" max="2"/>
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
                                    <input type="range" id="range1" step="1" max="2"/>
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
                                    <input type="range" id="range1" step="1" max="2"/>
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
                                    <input type="range" id="range1" step="1" max="2"/>
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

    const configFlatPickr  = {
        enableTime: false,
        dateFormat: "d-m-Y H:i",
        altInput:true,
        locale: "pt"
    }

    flatpickr("input[type=datetime-local]", configFlatPickr);

</script>

@endsection
