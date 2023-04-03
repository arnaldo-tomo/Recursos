@extends('layouts.principal_admin')
@section('conteudo')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-code"></i>MATERIAIS</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-download"></i>DOWNLOAD MATERIAIS</h6>
                    <form action="/pesquisar_materiais" method="POST">
                        @csrf
                    <div class="inner-item dash-search-form">
                        <div class="col-sm-3">
                            <label>CURSO</label>
                            <select name= "curso_id" id="curso_id" onchange="turmas_disciplinas(this)">
                                <option>--Selecione--</option>
                               @foreach ($cursos as $curso)
                                   <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>TURMA</label>
                            <select name="turma_id" id="turma_id">
                                <option>--Selecione--</option>
                               
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>DISCIPLINA</label>
                            <select name="disciplina_id" id="disciplina_id">
                                <option>--Selecione--</option>
                               
                            </select>
                        </div>
                       
                        <div class="col-sm-3">
                            <button type="submit" class="submit-btn"><i class="fa fa-search"></i>PESQUISAR</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">

                @if (session('materiais'))

                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-book"></i>{{ session('disciplina')->nome }}</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-book"></i> NOME</th>
                                    <th><i class="fa fa-info-circle"></i> DISCIPLINA</th>
                                    <th><i class="fa fa-file-o"></i> CURSO</th>
                                    <th><i class="fa fa-calendar"></i> SUBMETIDO EM</th>
                                    <th><i class="fa fa-pencil-square-o"></i> OBSERVAÇÕES</th>
                                    <th><i class="fa fa-link"></i> OPERAÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach (session('materiais') as $material)
                                <tr>
                                    <td>{{ $material->nome }}</td>
                                    <td>{{ $material->disciplina->nome }}</td>
                              
                                    <td>{{ $material->curso->nome }}</td>
                                    <td>{{ $material->data }}</td>
                                    <td>{{ $material->observacao }}</td>
                                    <td class="action-link">
                                    <a class="edit" href="{{ $material->ficheiro }}"><i class="fa fa-download"></i></a>
                                    <a class="edit" href="#" title="Editar" data-toggle="modal" data-target="#editDetailModal{{$material->id}}"><i class="fa fa-edit"></i></a>
                                    <a class="delete" href="#" title="Eliminar" data-toggle="modal" data-target="#deleteDetailModal{{$material->id}}"><i class="fa fa-remove"></i></a>
                                </td>
                                </tr> 
                               
                                           	<!-- Delete Modal -->
        <div id="deleteDetailModal{{$material->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar material</h4>
                    </div>
                    <div class="modal-body">
                    <label>Deseja realmente excluir material?</label>
                        <div class="table-action-box">
                            <a href="{{route('apagar_material', ['id'=>$material->id])}}" class="save"><i class="fa fa-check"></i>Sim</a>
                            <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        
<!--Edit details modal-->
<div id="editDetailModal{{$material->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>Editar material</h4>
            </div>
            <div class="modal-body dash-form">
            <form action="{{route('actualizar_material', ['id'=>$material->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-3">
                                <label><i class="fa fa-edit"></i>NOME</label>
                                <input type="text" name="nome" value="{{ $material->nome }}"  />
                            </div>
                <div class="col-sm-3">
                <label>CURSO</label>
                            <select name= "curso_id" id="curso_id" onchange="turmas_disciplinas(this)">
                                <option value="{{ $material->curso->id }}">{{ $material->curso->nome }}</option>
                               @foreach ($cursos as $curso)
                                   <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                               @endforeach
                            </select>
                </div>
                <div class="col-sm-3">
                <label>TURMA</label>
                            <select name="turma_id" id="turma_id">
                                <option value="{{ $material->turma->id }}" >{{ $material->turma->turma }}</option>
                               
                            </select>
                            </div>
                <div class="col-sm-3">
                <label>DISCIPLINA</label>
                            <select name="disciplina_id" id="disciplina_id">
                                <option value="{{ $material->disciplina->id }}">{{ $material->disciplina->nome }}</option>
                               
                            </select>
                </div>
               
                <div class="col-sm-12">
                    <label><i class="fa fa-info-circle"></i>Observação</label>
                    <textarea name="observacao">{{ $material->observacao }}</textarea>
                <div class="clearfix"></div>
                <div class="col-sm-12">
                                <label><i class="fa fa-file-code-o"></i>CARREGAR FICHEIRO</label>
                                <input class="file-input" type="file" name="ficheiro" id="ficheiro" />
                            </div>
                            
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
                    </div>
                </div> 


                    
                @else
              

                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-book"></i>NENHUM ITEM SELECIONADO</h6>
                  
                </div>
                @endif


            </div>
        </div>
    </div>
</div>
@endsection


