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
        <div class="container-consulta-content-scheduled">
            <div class="container-consulta-content-scheduled-filters">  
                <div class="container-consulta-content-scheduled-filters-container">
                    <input type="text" placeholder="">
                    
                    <span><i class="fa-solid fa-magnifying-glass"></i> Pesquise aqui</span>

                </div>
            </div>
            
            <div class="container-consulta-content-scheduled-body">

                @foreach ($consultas_agendadas as  $consulta_agendada)


            <div class="container-consulta-content-scheduled-content">
                <div class="container-consulta-content-scheduled-content-item">
                    <div class="container-consulta-content-scheduled-content-item-title">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Data solicitada</span>
                    </div>
                    <div class="container-consulta-content-scheduled-content-item-container">
                        <?php $criado_em = \Carbon\Carbon::parse($consulta_agendada->created_at);
                              $tempo_passado = $criado_em->locale('pt')->diffForHumans();
                              $data_formatada = $criado_em->format('d/m/Y H:i:s');
                              echo '<div class="container-consulta-content-scheduled-content-item-container-tempo"><div>' . $tempo_passado . ' </div> <div class="data-exata">' . $data_formatada . ' </div></div>';
                        
                        ?>
                    </div>

                </div>
                <div class="container-consulta-content-scheduled-content-item">
                    <div class="container-consulta-content-scheduled-content-item-title">
                        <i class="fa-solid fa-bars-progress"></i>
                        <span>Andamento</span>
                    </div>
                    <div class="container-consulta-content-scheduled-content-item-container">
                        {{$consulta_agendada->status_consulta}}
                    </div>
                </div>
                <div class="container-consulta-content-scheduled-content-item">
                    <div class="container-consulta-content-scheduled-content-item-title">
                        <i class="fa-solid fa-viruses"></i>
                        <span>Sintomas</span>
                    </div>
                    <div class="container-consulta-content-scheduled-content-item-container sintomas">

                       

                            @php
                        
                        $sintomasConsulta = json_decode($consulta_agendada->sintomas);

                        foreach ($sintomasConsulta as $sintomaConsulta) {

                            foreach ($sintomas as $sintoma) {

                                if($sintomaConsulta->id == $sintoma->id){

                                    echo '<div class="sintomas">' . $sintoma->name . '</div>';

                                }

                            }
                            
                        }
                        
                        
                        @endphp

                        
                        
                    </div>
                </div>
                <div class="container-consulta-content-scheduled-content-item">
                    <div class="container-consulta-content-scheduled-content-item-title">
                        <i class="fa-solid fa-clipboard"></i>
                        <span>Exames</span>
                    </div>
                    <div class="container-consulta-content-scheduled-content-item-container">
                        {{$consulta_agendada->exames}}
                    </div>
                </div>
                
            </div>
                
            @endforeach

            </div>
            
            
            
        </div>
    </div>
</section>

@include('./components/footer')


@endsection