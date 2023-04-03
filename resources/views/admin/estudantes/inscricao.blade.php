@extends('layouts.principal_admin')
@section('conteudo')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-book"></i>INSCRIÇÕES DE DISCIPLINAS</h5>
            <div class="section-divider"></div>
        </div>
    </div>

    @if(session('mensagem'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> Disciplina criada com sucesso. 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(session('mensagem_curso'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> . 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span ar    ia-hidden="true">&times;</span>{{ session('mensagem_curso') }}</button>
    </div>
    @endif
    @if(session('mensagem_docente'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> {{ session('mensagem_docente') }} 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
      <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-sm-5">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-plus-circle"></i>INSCRIÇÃO</h6>
                    <div class="inner-item">
                        <form action="/inscricao_cadeiras" method="POST">
                            @csrf
                        <div class="dash-form">
                            <label class="clear-top-margin"><i class="fa fa-calendar"></i>ANO LECTIVO</label>
                           <select name="ano_letivo_id" id="ano_letivo_id">
                               <option value="{{ $ano_letivo->id }}">{{ $ano_letivo->Ano }}</option>
                              
                           </select>
                           <input type="hidden" name="estudante_id" value="{{ $estudante->id }}">

                           <label><i class="fa fa-clock"></i>PERÍODO</label>
                            <select name="periodo_id" id="periodo_id">
                                <option value="{{ $periodo->id }}" >{{ $periodo->nome }}</option>
                            </select>
                           
                            <label><i class="fa fa-book"></i>CURSO</label>
                            <select name="curso_id" id="curso_id">
                                <option value="{{ $estudante->curso->id }}">{{ $estudante->curso->nome }}</option>
                             
                            </select>
                           
                            <label><i class="fa fa-clock"></i>REGIME</label>
                            <select name="regime_id" id="regime_id">
                                <option value="{{ $estudante->regime->id }}">{{ $estudante->regime->nome }}</option>
                              
                            </select>
                              
                            <label><i class="fa fa-book"></i>NIVEL ACADÉMICO</label>
                            <select name="nivel_id" id="nivel_id">
                                <option value="{{ $estudante->nivel_id }}">{{ $estudante->nivel->nivel }}</option>
                              
                            </select>
                            <div class="clearfix"></div>
                            <label><i class="fa fa-code"></i>DISCIPLINAS NORMAIS</label>
                            <select class="select2" multiple="multiple" name="disciplinas_normais[]">
                                @foreach ($estudante->curso->disciplinas as $disciplina)
                                @if($disciplina->curso->ano_id==$ano_letivo->id)
                                    @if($disciplina->nivel_id == $estudante->nivel_id && $disciplina->periodo_id==$periodo->id)
                                    <option value="{{ $disciplina->disciplina->id }}">{{ $disciplina->disciplina->nome }}</option>
                                    @endif
                                    @endif
                                @endforeach                              
                              
                            </select>
                            <label><i class="fa fa-code"></i>DISCIPLINAS EM ATRASO</label>
                            <select class="select2" multiple="multiple" name="disciplinas_atrasos[]">
                                <option>-- Selecione --</option>
                              
                            </select>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i>SALVAR</button>
                            </div>
                        </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
      
        
            <div class="col-sm-7">
            @if(session('actualizar'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> disciplina actualizado com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(session('Apagar'))
    <div class="alert alert-card alert-danger" role="alert"><strong class="text-capitalize">Parabens!</strong> disciplina eliminado com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-sliders"></i>TODAS DISCIPLINAS</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-book"></i>DISCIPLINA</th>
                                    <th><i class="fa fa-user-secret"></i>NÍVEL</th>
                                    <th><i class="fa fa-info-circle"></i>PERÍODO</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($estudante->curso->disciplinas as $disciplina)
                                @if($disciplina->curso->ano_id==$ano_letivo->id)
                                @if($disciplina->nivel_id == $estudante->nivel_id && $disciplina->periodo_id==$periodo->id)
                                <tr>
                                <td>{{ $disciplina->disciplina->nome }}</td>                                
                                <td>{{ $disciplina->nivel->nivel }}</td>                                
                                <td>{{ $disciplina->periodo->nome }}</td>                                
                                </tr>
                                @endif
                                @endif
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection