@extends('layouts.principal_admin')
@section('conteudo')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-address-card"></i>VISUALIZAR NOTAS</h5>
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
            <div class="col-lg-12">
                <form action="/pesquisar_notas" method="POST">
                    @csrf
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-search"></i>FAÇA SELEÇÃO</h6>
                    <div class="inner-item dash-search-form">
                        <div class="col-md-3 col-sm-6">
                            <label for="validationDefault01">CURSO</label>
                            <select name="curso_id" id="curso_id" onchange="turmas_disciplinas(this)" required>
                             <option value="" required>--Selecione--</option>
                             @foreach ($cursos as $curso)
                                 <option value="{{ $curso->id }}"> {{$curso->nome}}</option>
                             @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="validationDefault01">TURMA</label>
                            <select name="turma_id" id="turma_id" required>
                                <option required>--Selecione--</option>
                             
                            </select>
                        </div>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-md-3 col-sm-6">
                            <label for="validationDefault01">DISCIPLINA</label>
                            <select name="disciplina_id" id="disciplina_id" required>
                                <option required>--Selecione--</option>
                             
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="validationDefault01">TIPO DE AVALIAÇÃO</label>
                            <select name="tipo_avaliacao_id" required>
                                <option required>--Selecione--</option>
                            
                                @foreach ($tipos_avaliacoes as $tipo_avaliacao)
                                    <option value="{{ $tipo_avaliacao->id }} required">{{ $tipo_avaliacao->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-3">
                            <button type="submit" class="submit-btn"><i class="fa fa-search"></i>SELECIONE</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                </form>
            </div>

         

            <div class="col-lg-12">
                @if (session('notas'))
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-info-circle"></i>NOTAS - {{ session('disciplina')->nome }} Turma {{ session('turma')->turma }}</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                             
                                    <th><i class="fa fa-user"></i>NOME</th>
                                    <th><i class="fa fa-book"></i>CURSO</th>
                                    <th><i class="fa fa-code"></i>DISCIPLINA</th>
                                    <th><i class="fa fa-cogs"></i>TIPO AVALIAÇÃO</th>
                                    <th><i class="fa fa-address-card"></i>CLASSIFICAÇÃO</th>
                                    <th><i class="fa fa-address-card"></i>CLASSIFICAÇÃO MÁXIMA</th>
                                    <th><i class="fa fa-edit"></i>OBSERVAÇÃO</th>
                                    <th><i class="fa fa-tasks"></i>OPERAÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (session('notas') as $nota)
                                <tr>
                                    <td>{{ $nota->estudante->estudante->name }}</td>
                                    <td>{{ $nota->curso->nome }}</td>
                                    <td>{{ $nota->disciplina->nome }}</td>
                                    <td>
                                        {{ $nota->tipo_avaliacao->nome }}
                                    </td>
                                    <td>{{ $nota->nota }}</td>
                                    <td>{{ $nota->nota_maxima }}</td>
                                    <td>{{ $nota->observacao }}</td>
                                    
                                    <td class="action-link">
                                    <a class="edit" href="#" title="Editar" data-toggle="modal" data-target="#editDetailModal{{$nota->id}}"><i class="fa fa-edit"></i></a>
                                    <a class="delete" href="#" title="Eliminar" data-toggle="modal" data-target="#deleteDetailModal{{$nota->id}}"><i class="fa fa-remove"></i></a>
                                </td>
                                </tr>

                                                                	<!-- Delete Modal -->
        <div id="deleteDetailModal{{$nota->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar nota</h4>
                    </div>
                    <div class="modal-body">
                    <label>Deseja realmente excluir?</label>
                        <div class="table-action-box">
                            <a href="{{route('apagar_nota', ['id'=>$nota->id])}}" class="save"><i class="fa fa-check"></i>Sim</a>
                            <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
                
<!--Edit details modal-->
<div id="editDetailModal{{$nota->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>Editar nota</h4>
            </div>
            <div class="modal-body dash-form">
            <form action="{{route('actualizar_nota', ['id'=>$nota->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="col-sm-3">
                <label><i class="fa fa-edit"></i>NOME</label>
                <input type="text" value="{{ $nota->estudante->estudante->name }}" disabled/>
                </div>
                <div class="col-sm-3">
                <label><i class="fa fa-edit"></i>Curso</label>
                <input type="text" value="{{ $nota->curso->nome }}" disabled/>
                            </div>
                <div class="col-sm-3">
                <label><i class="fa fa-edit"></i>Disciplina</label>
                <input type="text" value="{{ $nota->disciplina->nome }}" disabled/>
                </div>
                <div class="col-sm-3">
                <label><i class="fa fa-edit"></i>Tipo avaliação</label>
                <input type="text" value="{{ $nota->tipo_avaliacao->nome }}" disabled/>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-3">
                <label><i class="fa fa-edit"></i>CLASSIFICAÇÃO</label>
                <input type="text" name="nota" value="{{ $nota->nota }}"/>
                </div>
                <div class="col-sm-3">
                <label><i class="fa fa-edit"></i>CLASSIFICAÇÃO MÁXIMA</label>
                <input type="text" name="nota_max" value="{{ $nota->nota_maxima }}"/>
                </div>
                <div class="col-sm-3">
                <label><i class="fa fa-edit"></i>Observação</label>
                <input type="text" name="observacao" value="{{ $nota->observacao }}"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                        <div class="table-action-box">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Actualizar</button>
                            <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i> Sair</a>
                        </div>
                    </div>
                    </form>
        </div>
    </div>
</div>
                                @endforeach
                           
                            </tbody>
                        </table>
                @else
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-info-circle"></i>NENHUM ITEM SELECIONADO</h6>
            </div>
            </div>
            @endif
           
        </div>
    </div>
</div>
@endsection