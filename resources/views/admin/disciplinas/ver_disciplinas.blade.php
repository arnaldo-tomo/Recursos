@extends('layouts.principal_admin')
@section('conteudo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-cogs"></i>DISCIPLINAS</h5>
                <div class="section-divider"></div>
            </div>
        </div>

        @if (session('mensagem'))
            <div class="alert alert-card alert-success" role="alert">Parabens! <strong class="text-capitalize"> Disciplina
                    criada com sucesso.</strong>

                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif
        @if (session('mensagem_curso'))
            <div class="alert alert-card alert-success" role="alert">Parabens! <strong class="text-capitalize">
                    {{ session('mensagem_curso') }}</strong> .
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span ar
                        ia-hidden="true">&times;</span></button>
            </div>
        @endif
        @if (session('mensagem_docente'))
            <div class="alert alert-card alert-success" role="alert">Parabens! <strong class="text-capitalize">
                    {{ session('mensagem_docente') }}</strong>

                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="col-sm-3">
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-plus-circle"></i>CONECTAR CURSOS</h6>
                        <div class="inner-item">
                            <form action="/conectar_cursos" method="POST">
                                @csrf
                                <div class="dash-form">
                                    <label class="clear-top-margin"><i class="fa fa-book"></i>CURSO</label>
                                    <select name="curso_id" id="curso_id_nivel" onchange="mostrar_nivel(this);">
                                        <option value="">==Selecione==</option>
                                        @foreach ($cursos as $curso)
                                            <option value="{{ $curso->id }}">{{ $curso->codigo }}-{{ $curso->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label><i class="fa fa-clock-o"></i>NIVEL</label>
                                    <select name="nivel_id" id="nivel_id">
                                        <option value="">==Selecione==</option>
                                        @foreach ($nivel as $nivels)
                                            <option value="{{ $nivels->id }}">{{ $nivels->nivel }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <label><i class="fa fa-clock-o"></i>SEMESTRE</label>
                                    <select name="" id="">
                                        <option value="">==Selecione==</option>
                                        @foreach ($semestre as $semestres)
                                            <option value="{{ $semestres->id }}">{{ $semestres->nome }}
                                            </option>
                                        @endforeach

                                    </select>

                                    <label><i class="fa fa-code"></i>DISCIPLINAS</label>
                                    <select class="select2" multiple="multiple" name="disciplina_id[]">
                                        <option>-- Selecione --</option>
                                        @foreach ($disciplinas as $disciplina)
                                            <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                        @endforeach
                                    </select>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i>
                                            CONECTAR</button>
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-sm-8">
                    @if (session('actualizar'))
                        <div class="alert alert-card alert-success" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> disciplina actualizado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    @if (session('Apagar'))
                        <div class="alert alert-card alert-danger" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> disciplina eliminado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-sliders"></i>TODAS DISCIPLINAS</h6>
                        <div class="inner-item">
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-book"></i>NOME</th>
                                        <th><i class="fa fa-user-secret"></i>Nº DE DOCENTES</th>
                                        <th><i class="fa fa-info-circle"></i>DESCRIÇÃO</th>
                                        <th><i class="fa fa-sliders"></i>CURSO</th>
                                        <th><i class="fa fa-sliders"></i>OPERAÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($conexao as $disciplina)
                                        <tr>
                                            <td>{{ $disciplina->disciplina->nome }}</td>
                                            <td>{{ sizeof($disciplina->disciplina->docentes) }}</td>
                                            <td>{{ $disciplina->disciplina->descricao }}</td>
                                            <td>{{ $disciplina->curso->nome }}</td>
                                            <td class="action-link">
                                                <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                    data-target="#editDetailModal{{ $disciplina->disciplina->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                    data-target="#deleteDetailModal{{ $disciplina->disciplina->id }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>



                                        <!-- Delete Modal -->
                                        <div id="deleteDetailModal{{ $disciplina->id }}" class="modal fade"
                                            role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar
                                                            disciplina</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Deseja realmente excluir {{ $disciplina->nome }}?</label>
                                                        <div class="table-action-box">
                                                            <a href="{{ route('apagar_disciplina', ['id' => $disciplina->id]) }}"
                                                                class="save"><i class="fa fa-check"></i>Sim</a>
                                                            <a href="#" class="cancel" data-dismiss="modal"><i
                                                                    class="fa fa-ban"></i>Cancelar</a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Edit details modal-->
                                        <div id="editDetailModal{{ $disciplina->id }}" class="modal fade"
                                            role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-edit"></i>EDIT SUBJECT
                                                            DETAILS</h4>
                                                    </div>
                                                    <div class="modal-body dash-form">
                                                        <div class="col-sm-3">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-book"></i>NAME</label>
                                                            <input type="text" placeholder="Name"
                                                                value="Mathematics" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-code"></i>CODE</label>
                                                            <input type="text" placeholder="Code" value="MTH101" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-book"></i>CLASS</label>
                                                            <select>
                                                                <option>-- Select --</option>
                                                                <option>5 STD</option>
                                                                <option>6 STD</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-user-secret"></i>TEACHER</label>
                                                            <select>
                                                                <option>-- Select --</option>
                                                                <option>Lennore</option>
                                                                <option>John</option>
                                                            </select>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-sm-12">
                                                            <label><i class="fa fa-info-circle"></i>DESCRIPTION</label>
                                                            <textarea placeholder="Enter Description Here"></textarea>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="table-action-box">
                                                            <a href="#" class="save"><i
                                                                    class="fa fa-check"></i>SAVE</a>
                                                            <a href="#" class="cancel" data-dismiss="modal"><i
                                                                    class="fa fa-ban"></i>CLOSE</a>
                                                        </div>
                                                    </div>
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
