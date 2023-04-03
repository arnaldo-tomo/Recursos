@extends('layouts.principal_admin')
@section('conteudo')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-code"></i>AVALIAÇÕES</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    @if(session('actualizar'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> Avaliação actualizada com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(session('Apagar'))
    <div class="alert alert-card alert-danger" role="alert"><strong class="text-capitalize">Parabens!</strong> Avaliação eliminada com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-download"></i>DOWNLOAD</h6>
                    <form action="/pesquisar_avaliacoes" method="POST">
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
                            <label>DISCIPLINAS</label>
                            <select name="disciplina_id" id="disciplina_id">
                                <option>--Selecione--</option>
                               
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>TIPO DE AVALIAÇÃO</label>
                            <select name="tipo_avaliacao_id">
                                <option>--Selecione--</option>
                                @foreach ($tipos_avaliacoes as $tipo_avaliacao)
                                    <option value="{{ $tipo_avaliacao->id }}">{{ $tipo_avaliacao->nome }}</option>
                                @endforeach
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

                @if (session('avaliacoes'))

                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-book"></i>{{ session('disciplina')->nome }}</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-book"></i>DISCIPLINA</th>
                                    <th><i class="fa fa-info-circle"></i>TIPO DE AVALIAÇÃO</th>
                                    <th><i class="fa fa-file-o"></i>CURSO</th>
                                    <th><i class="fa fa-calendar"></i>SUBMETIDO EM</th>
                                    <th><i class="fa fa-calendar"></i>DATA DE ENTREGA</th>
                                    <th><i class="fa fa-fa-info-circle"></i>ESTADO</th>
                                    <th><i class="fa fa-link"></i>OPERAÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach (session('avaliacoes') as $avaliacao)
                                <tr>
                                    <td>{{ $avaliacao->disciplina->nome }}</td>
                                    <td>{{ $avaliacao->tipo_avaliacao->nome }}</td>
                                    <td>{{ $avaliacao->curso->nome }}</td>
                                    <td>{{ $avaliacao->data }}</td>
                                   
                                    <td>{{ $avaliacao->data_entrega }}</td>
                               
                                    <td>
                                        <div class="chart-legends">
                                        @if ($avaliacao->estado=='0')
                                        <span class="red">Não partilhado</span>
                                        
                                        @elseif($avaliacao->estado=='1')
    
                                        <span class="orange">Em avaliação</span>
    
                                        @elseif($avaliacao->estado=='2')
    
                                        <span class="green">Partilhado</span>
    
                                        @endif
                                        </div>
                                    </td>
                                    <td class="action-link">
                                    
                                    <a title="Baixar" class="edit" href="{{ $avaliacao->ficheiro }}"><i class="fa fa-download"></i></a>
                                    <a class="edit" href="#" title="Editar" data-toggle="modal" data-target="#editDetailModal{{$avaliacao->id}}"><i class="fa fa-edit"></i></a>
                                    <a class="delete" href="#" title="Eliminar" data-toggle="modal" data-target="#deleteDetailModal{{$avaliacao->id}}"><i class="fa fa-remove"></i></a>
                                </td>
                                </tr> 
                              
                             
                                           	<!-- Delete Modal -->
        <div id="deleteDetailModal{{$avaliacao->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar avaliação</h4>
                    </div>
                    <div class="modal-body">
                    <label>Deseja realmente excluir avaliação?</label>
                        <div class="table-action-box">
                            <a href="{{route('apagar_avaliacao', ['id'=>$avaliacao->id])}}" class="save"><i class="fa fa-check"></i>Sim</a>
                            <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        
<!--Edit details modal-->
<div id="editDetailModal{{$avaliacao->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>Editar avaliação</h4>
            </div>
            <div class="modal-body dash-form">
            <form action="{{route('actualizar_avaliacao', ['id'=>$avaliacao->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="col-sm-3">
                <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>CURSO</label>
                                <select name="curso_id" id="curso_id" onchange="turmas_disciplinas(this)">
                                    <option value="{{$avaliacao->curso->id}}">{{ $avaliacao->curso->nome }}</option>
                                   @foreach ($cursos as $curso)
                                     <option value="{{$curso->id}}" >{{$curso->id}}--{{$curso->nome}}</option>
                                   @endforeach
                                </select>
                </div>
                <div class="col-sm-3">
                                <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>TURMA</label>
                                <select name="turma_id" id="turma_id">
                                    <option value="{{$avaliacao->turma->id}}">{{ $avaliacao->turma->turma }}</option>
                                   
                                </select>
                            </div>
                <div class="col-sm-3">
                <label class="clear-top-margin"><i class="fa fa-code"></i>DISCIPLINA</label>
                            <select name="disciplina_id" id="disciplina_id">
                                <option value="{{$avaliacao->disciplina->id }}">{{ $avaliacao->disciplina->nome }}</option>
                               
                            </select>
                </div>
                <div class="col-sm-3">
                <label class="clear-top-margin"><i class="fa fa-file-o"></i>TIPO AVALIAÇÃO</label>
                                <select name="tipo_avaliacao_id" id="tipo_avaliacao_id">
                                    <option value="{{$avaliacao->tipo_avaliacao_id}}">{{ $avaliacao->tipo_avaliacao->nome }}</option>
                                   @foreach ($tipos_avaliacoes as $tipo_avaliacao)
                                     <option value="{{$tipo_avaliacao->id}}">{{$tipo_avaliacao->nome}}</option>
                                   @endforeach
                                </select>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-12">
                    <label><i class="fa fa-info-circle"></i>Observação</label>
                    <textarea name="observacao">{{ $avaliacao->observacao }}</textarea>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-12">
                    <br>
                    <div class="col-sm-1">
             
                        <input  type="checkbox" name="publicar" onclick="partilha({{ $avaliacao->id }});" id="verificar{{ $avaliacao->id }}" value='1' />
                        </div>
                    <div class="col-sm-1">
                    <label for="verificar{{ $avaliacao->id }}" style="font-size: 105%"  class="clear-top-margin">PARTILHAR</label>
         
                    </div>                                
                    <br>
                    <br>
                </div>
                <script>
                    function partilha(valor){                       
                        var checkbox = document.getElementById('verificar'+valor);
                        var id = "data_entrega"+valor;

                        if(checkbox.checked==true){
                            document.getElementById(id).style.display="block";
                        }else{                          
                           document.getElementById(id).style.display="none";
                        }
                    }
                </script>

                <div class="col-sm-3" id="data_entrega{{ $avaliacao->id }}"  style="display: none;">
                    <label class="clear-top-margin"><i class="fa fa-calendar"></i>DATA ENTREGA</label>
                    <input type="date" id="entrega" name="entrega">
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