@extends('layouts.principal_admin')
@section('conteudo')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-calendar"></i>HORÁRIO</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <?php $cont=0; ?>
        @foreach ($periodos as $periodo)
        
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-edit"></i>Período {{ $periodo->nome }}</h6>
                    @foreach ($periodo->turnos as $turno)
                    <div class="inner-item">
                        {{ $turno->descricao }}
                        <table id="table_id{{ $cont }}" class="display responsive nowrap" cellspacing="0" width="100%">
                            <?php $cont++; ?>
                            <thead>
                                <tr>
                                    <th><i class="fa fa-clock-o"></i> HORA</th>
                                    <th><i class="fa fa-calendar"></i> SEGUNDA-FEIRA</th>
                                    <th><i class="fa fa-calendar"></i> TERÇA-FEIRA</th>
                                    <th><i class="fa fa-calendar"></i> QUARTA-FEIRA</th>
                                    <th><i class="fa fa-calendar"></i> QUINTA-FEIRA</th>
                                    <th><i class="fa fa-calendar"></i> SEXTA-FEIRA</th>
                                    <th><i class="fa fa-calendar"></i> SÁBADO</th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($turno->tempos as $tempo)
                                    <tr>
                                        <td>{{$tempo->tempo}}º {{$tempo->inicio}}-{{$tempo->fim}}</td>
                                         @foreach ($dias as $dia)
                                         <?php $contador = 0; ?>{{--  contador para determinar se num dia e uma determinada hora tem  o respetivo horario --}}
                                         @foreach ($horarios->sortBy('dia_id') as $horario)
                                         @if ($horario->tempo_id == $tempo->id)
                                         @if ($horario->dia_id==$dia->id)
                                         <?php $contador ++; ?>
                                         <td>
                                            <span>Disciplina: {{$horario->disciplina->nome}}</span>
                                            <span>Sala: {{$horario->sala}}</span>
                                            <span>Curso: {{$horario->docente->docente->name}}</span>
                                        </td>                                        
                                         @endif
                                         @endif
                                         @endforeach
                                         @if ($contador==0)
                                         <td></td>{{--  se nao tiver nenhum espaço em branco --}}
                                         @elseif ($contador > 1)
                                         <td></td>{{--   se tiver mais de um espaço em branco --}}
                                         @endif
                                         @endforeach
                                     
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                     
                    </div>
                    @endforeach
                </div>
            </div>
        </div>            
        @endforeach
   
    </div>
</div>

@endsection