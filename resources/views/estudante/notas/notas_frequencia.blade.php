

@extends('layouts.principal_admin')
@section('conteudo')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-address-card"></i>NOTAS DE FREQUÊNCIA</h5>
            <div class="section-divider"></div>
        </div>
    </div>

    {{-- @if(session('notas'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> {{ session('notas') }}. 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif --}}
    @if(session('actualizar'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> Nota actualizada com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(session('Apagar'))
    <div class="alert alert-card alert-danger" role="alert"><strong class="text-capitalize">Parabens!</strong> Nota eliminada com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            {{-- <div class="col-lg-12">
                <form action="pesquisar_pauta_frequencia_estudante" method="POST">
                    @csrf
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-search"></i>FAÇA SELEÇÃO</h6>
                    <div class="inner-item dash-search-form">                                            
                        <div class="clearfix visible-sm"></div>
                        <div class="col-md-3 col-sm-6">
                            <label>DISCIPLINA</label>
                            <select name="disciplina_id" id="disciplina_id">
                                <option>--Selecione--</option>
                                @foreach ($disciplinas as $disciplina)
                                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                @endforeach
                             
                            </select>
                        </div>
                     
                        <div class="col-md-3 col-sm-6">
                            <button type="submit" class="submit-btn"><i class="fa fa-search"></i>SELECIONE</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                </form>
            </div> --}}

         

            <div class="col-lg-12">
         
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-info-circle"></i>NOTAS</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                             
                                    <th><i class="fa fa-code"></i>DISCIPLINA</th>
                                    
                                   @foreach ($tipos_avaliacoes as $tipo_avaliacao)
                                   <th><i class="fa fa-address-card" style="text-transform: uppercase;"></i>{{ $tipo_avaliacao->nome }}</th>
                                   @endforeach                                    
                                    <th><i class="fa fa-edit"></i>MÉDIA</th>
                                    <th><i class="fa fa-edit"></i>OBSERVAÇÃO</th>
                                 
                   
                                    
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($disciplinas as $disciplina)
                                <tr>
                                    <td>{{ $disciplina->nome }}</td>
                                    
                                    @foreach ($tipos_avaliacoes as $tipo_avaliacao)
                                    <td>
                                    @foreach ($notas as $nota)
                                    @if ($disciplina->id == $nota->disciplina_id) 
                                   
                                    @if ($tipo_avaliacao->id == $nota->tipo_avaliacao_id)
                                    {{ $nota->classificacao }}
                                    @break 
                                    @endif                               
                                    @endif                               
                                   @endforeach
                                  
                                    </td>
                                   @endforeach 
                                   
                                   <td>0</td>
                                    <td class="text-danger">Excluido</td>                                 
                                
                                </tr>


                                @endforeach
                           
                            </tbody>
                        </table>
               
            </div>
         
           
        </div>
    </div>
</div>
</div>
@endsection