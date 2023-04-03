@extends('layouts.principal_admin')
@section('conteudo')




<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-cogs"></i>TURMAS</h5>
            <div class="section-divider"></div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-sm-4">
                
    @if(session('tempo'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> Tempo criado com sucesso. 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-plus-circle"></i>NOVO TEMPO</h6>
                    <div class="inner-item">
                        <form action="/salvar_tempo" method="POST">
                            @csrf
                        <div class="dash-form">
                            <label class="clear-top-margin"><i class="fa fa-book"></i>TEMPO</label>
                           <select name="tempo" id="">
                            <option>-- Selecione --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                           </select>
                            <label><i class="fa fa-code"></i>PERÍODO</label>
                            <select name="periodo_id" onchange="mostrar_turnos(this);">
                                <option>-- Selecione --</option>
                               @foreach ($periodos as $periodo)
                                   <option value="{{$periodo->id}}">{{$periodo->nome}}</option>
                               @endforeach
                            </select>
                            <label><i class="fa fa-code"></i>TURNO</label>
                            <select name="turno_id" id="turno_id">
                                <option>-- Selecione --</option>
                              
                            </select>
                            <label><i class="fa fa-calendar"></i>INÍCIO</label>
                            <input type="time" name="inicio" placeholder="" />
                            <label><i class="fa fa-calendar"></i>FIM</label>
                            <input type="time" name="fim" placeholder="" />
                            <div class="clearfix"></div>
                            <br>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> CRIAR</button>
                                
                            </div>
                        </div>
                    </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-sm-8">
            @if(session('actualizar'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> turma actualizado com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(session('Apagar'))
    <div class="alert alert-card alert-danger" role="alert"><strong class="text-capitalize">Parabens!</strong> turma eliminado com sucesso. </a> 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-sliders"></i>TODOS TEMPOS</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-book"></i>TEMPO</th>
                                    <th><i class="fa fa-cogs"></i>INÍCIO</th>
                                    <th><i class="fa fa-code"></i>FIM</th>
                                    <th><i class="fa fa-info-circle"></i>TURNO</th>
                                    <th><i class="fa fa-sliders"></i>OPERAÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($tempos as $tempo)
                             
                                <tr>
                                <td>{{$tempo->tempo}}</td>
                                <td>{{$tempo->inicio}}</td>
                                <td>{{$tempo->fim}}</td>
                                <td>{{$tempo->turno->descricao}}</td>
                            
                                    <td class="action-link">
                                        <a class="edit" href="#" title="Edit" data-toggle="modal" data-target="#editDetailModal{{$tempo->id}}"><i class="fa fa-edit"></i></a>
                                        <a class="delete" href="#" title="Delete" data-toggle="modal" data-target="#deleteDetailModal{{$tempo->id}}"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                                    

   <!-- Delete Modal -->
   <div id="deleteDetailModal{{$tempo->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar tempo</h4>
                    </div>
                    <div class="modal-body">
                    <label>Deseja realmente excluir {{$tempo->tempo}}?</label>
                        <div class="table-action-box">
                        <a href="{{route('apagar_tempo', ['id'=>$tempo->id])}}" class="save"><i class="fa fa-check"></i>Sim</a>
                            <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

<!--Edit details modal-->
<div id="editDetailModal{{$tempo->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>EDITAR TEMPO</h4>
            </div>
            <div class="modal-body dash-form">
            <form action="{{route('actualizar_tempo', ['id'=>$tempo->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="col-sm-4">
                    <label class="clear-top-margin"><i class="fa fa-book"></i>TEMPO</label>
                    <input type="text" name="tempo" value="{{$tempo->tempo}}"/>
                </div>
                <div class="col-sm-4">
                    <label class="clear-top-margin"><i class="fa fa-code"></i>INICIO</label>
                    <input type="text" name="codigo" value="{{$tempo->inicio}}" />
                </div>
                <div class="col-sm-4">
                    <label class="clear-top-margin"><i class="fa fa-code"></i>FIM</label>
                    <input type="text" name="codigo" value="{{$tempo->fim}}" />
                </div>
                <div class="col-sm-4">
                    <label class="clear-top-margin"><i class="fa fa-user-secret"></i>TURNO</label>
                    <select name="curso_id">
                                <option value="{{$tempo->id}}">{{$tempo->turno->descricao}}</option>
                               @foreach ($tempo->turno->periodo->turnos as $turno)
                                   <option value="{{$turno->id}}">{{$turno->descricao}}</option>
                               @endforeach
                            </select>
                </div>
                <div class="clearfix"></div>
              
            </div>
            <div class="modal-footer">
                        <div class="table-action-box">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Actualizar</button>
                            <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>Sair</a>
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
            </div>
        </div>
    </div>
</div>



@endsection