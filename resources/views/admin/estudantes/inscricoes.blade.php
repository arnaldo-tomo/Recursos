@extends('layouts.principal_admin')
@section('conteudo')
    

    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-users"></i>TODOS ESTUDANTES</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
            @if(session('matricula_nao'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> Matricula renovada com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
            @if(session('actualizar'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> estudante actualizado com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(session('Apagar'))
    <div class="alert alert-card alert-danger" role="alert"><strong class="text-capitalize">Parabens!</strong> estudante eliminado com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-user"></i>ESTUDANTES</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    
                                    <th><i class="fa fa-id-card"></i>CÓDIGO #</th>
                                    <th><i class="fa fa-user"></i>APELIDO</th>
                                    <th><i class="fa fa-user"></i>OUTROS NOMES</th>
                                    <th><i class="fa fa-book"></i>CURSO</th>
                                    <th><i class="fa fa-cogs"></i>MATRICULA</th>
                                    
                                    <th><i class="fa fa-envelope-o"></i>E-MAIL</th>
                                    
                                    <th><i class="fa fa-tasks"></i>OPERAÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                     
                                @foreach ($estudantes as $estudante)
                                <tr>
                                <td>{{$estudante->codigo}}</td>
                                <td>{{$estudante->estudante->apelido}}</td>
                                <td>{{$estudante->estudante->name}}</td>
                                <td>{{$estudante->curso->nome}}</td>
                                <td>
                                    {{$estudante->ano_lectivo->Ano}}
                                </td>
                               
                                <td>{{$estudante->estudante->email}}</td>
                                <td class="">
                                    <a class="" href="/ver_inscricoes{{ $estudante->id }}" >Ver Inscrições</a>
                                   
                                </td>
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