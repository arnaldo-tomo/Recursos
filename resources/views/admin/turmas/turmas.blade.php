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


            @if(session('turma'))
            <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> turma criada com sucesso.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif

            <div class="col-sm-12">
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
                    <h6 class="item-title"><i class="fa fa-sliders"></i>TURMAS</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-book"></i>CÓDIGO</th>
                                    <th><i class="fa fa-users"></i>TURMA</th>
                                    <th><i class="fa fa-code"></i>CURSO</th>
                                    <th><i class="fa fa-info-circle"></i>ESTUDANTES</th>
                                    <th><i class="fa fa-info-circle"></i>DESCRIÇÃO</th>
                                    <th><i class="fa fa-info-circle"></i>LOTAÇÃO MAX</th>
                                    <th><i class="fa fa-sliders"></i>OPERAÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($turmas as $turma)

                                <tr>
                                    <td>{{$turma->codigo}}</td>
                                    <td>{{$turma->turma}}</td>
                                    <td>{{$turma->curso->nome}}</td>
                                    <td>{{ sizeof($turma->estudantes)}}</td>
                                    <td>{{$turma->descricao}}</td>
                                    <td>{{$turma->lotacao_max }}</td>
                                    <td>
                                        {{-- <a class="" href="#" title="Edit" data-toggle="modal" data-target="#editDetailModal{{$turma->id}}">Criar turmas</a>| --}}
                                        {{--<a href="">ver</a>--}}
                                        <a class="edit" href="#" title="Edit" data-toggle="modal" data-target="#editDetailModal{{$turma->id}}"><i class="fa fa-edit"></i></a>
                                        <a class="delete" href="#" title="Delete" data-toggle="modal" data-target="#deleteDetailModal{{$turma->id}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Inicio do modal para eliminar a turma -->
                                <div id="deleteDetailModal{{$turma->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar curso</h4>
                                            </div>
                                            <div class="modal-body">
                                                <label>Deseja realmente excluir {{$turma->nome}}?</label>
                                                <div class="table-action-box">
                                                    <a href="{{route('apagar_turma', ['id'=>$turma->id])}}" class="save"><i class="fa fa-check"></i>Sim</a>
                                                    <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Fim do modal para eliminar a turma-->


                                <!--Inicio do modal para editar os dados da turma-->
                                <div id="editDetailModal{{$turma->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-edit"></i>Editar turma</h4>
                                            </div>
                                            <div class="modal-body dash-form">
                                                <form action="{{route('actualizar_turma', ['id'=>$turma->id])}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$turma->id}}" />
                                                    <div class="col-sm-4">
                                                        <label class="clear-top-margin"><i class="fa fa-book"></i>Turma</label>
                                                        <input type="text" name="turma" value="{{$turma->turma}}" onchange="atribuir_codigo(this);"/>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="clear-top-margin"><i class="fa fa-code"></i>Codigo</label>
                                                        <input type="text" name="codigo" value="{{$turma->codigo}}" id="codigo" />
                                                    </div>
                                                    <script>
                                                        function atribuir_codigo(valor) {
                                                            var string = valor.value;
                                                            var names = string.split(' ');
                                                            var initials = "";
                                                            for (var i = 0; i < names.length; i++) {
                                                                initials += names[i].substring(0, 1).toUpperCase();
                                                            }


                                                            // if (names.length > 1) {
                                                            // initials += names[names.length - 1].substring(0, 1).toUpperCase();
                                                            // }
                                                            document.getElementById('codigo').value = initials;


                                                        }

                                                    </script>

                                                    <div class="col-sm-4">
                                                        <label class="clear-top-margin"><i class="fa fa-user-secret"></i>Curso</label>
                                                        <select name="curso_id">
                                                            <option value="{{$turma->curso->id}}">{{$turma->curso->nome}}</option>
                                                            @foreach($cursos as $curso)
                                                            <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-sm-12">
                                                        <label><i class="fa fa-info-circle"></i>DESCRIÇÃO</label>
                                                        <input type="text" name="descricao" value="{{$turma->descricao}}" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label><i class=""></i>LOTACAO MAXIMA</label>
                                                        <input type="number" value="{{$turma->lotacao_max}}" name="lotacao_max" id="lotacao_max" />
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
                                <!--Fim do modal para editar a turma-->

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
