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

                <div class="content-scheduled">

                    <div class="content-scheduled-title">

                        <div class="content-scheduled-title-data">
                            <?php $criado_em = \Carbon\Carbon::parse($consulta_agendada->created_at);
                                  $tempo_passado = $criado_em->locale('pt')->diffForHumans();
                                  $data_formatada = $criado_em->format('d/m/Y H:i:s');
                                  echo '<div>' . $tempo_passado . ' </div> <div class="data-exata">' . $data_formatada . ' </div>';
                            
                            ?>
                        </div>

                        <div class="content-scheduled-title-status">
                            {{$consulta_agendada->status_consulta}}
                        </div>
                        <div class="content-scheduled-title-diagnostico">
                            diagnóstico
                        </div>
                        <div class="content-scheduled-title-icon">
                            <i class="fa-solid fa-chevron-down"></i>
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