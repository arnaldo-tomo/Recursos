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
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong>
        Disciplina criada com sucesso.
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if (session('mensagem_curso'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> .
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span ar ia-hidden="true">&times;</span>{{ session('mensagem_curso') }}</button>
    </div>
    @endif
    @if (session('mensagem_docente'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong>
        {{ session('mensagem_docente') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-sm-5">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-plus-circle"></i>ATRIBUIÇÃO DE DISCIPLINAS</h6>
                    <div class="inner-item">
                        <form action="/conectar_docentes" method="POST">
                            @csrf
                            <div class="dash-form">
                                <label class="clear-top-margin"><i class="fa fa-book"></i>DOCENTE</label>
                                <select required name="docente_id" id="docente_id">
                                    <option value="">==Selecione==</option>
                                    @foreach ($docentes as $docente)
                                    <option value="{{ $docente->id }}">
                                        {{ $docente->codigo }}-{{ $docente->docente->name }}
                                        {{ $docente->docente->apelido }}</option>
                                    @endforeach
                                </select>

                                <label><i class="fa fa-code"></i>CURSOS</label>
                                <select required name="curso_id" id="curso_id" onchange="turmas_disciplinas(this)">
                                    <option>-- Selecione --</option>
                                    @foreach ($curso as $cursos)
                                    <option value="{{ $cursos->id }}">{{ $cursos->nome }}</option>
                                    @endforeach

                                </select>

                                <div class="clearfix"></div>
                                <label><i class="fa fa-code"></i>NIVEL A LECIONAR</label>
                                <select required name="nivel_id" id="nivel_id" onchange="mostrar_nivel(this)">
                                    <option>-- Selecione --</option>
                                    @foreach ($niveis as $nivel)
                                    <option value="{{ $nivel->id }}">{{ $nivel->nivel }}</option>
                                    @endforeach
                                </select>




                                <div class="clearfix"></div>


                                <label><i class="fa fa-code"></i>DISCIPLINAS</label>
                                <select name="disciplina_id">
                                    <option>-- Selecione --</option>
                                    @foreach ($disciplinas as $disciplina)
                                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                    @endforeach
                                </select>
                                <label><i class="fa fa-code"></i>TURMAS</label>
                                <select name="turma_id[]" id="turma_id" onchange="estudantes_turma(this)">
                                    <option>-- Selecione --</option>
                                    @foreach ($turma as $turmas)
                                    <option value="{{ $turmas->id }}">{{ $turmas->turma }}</option>
                                    @endforeach

                                </select>
                                <label><i class="fa fa-code"></i>PERÍODO A LECIONAR</label>
                                <select required name="periodo_id" id="periodo_id">
                                    <option>-- Selecione --</option>
                                    @foreach ($periodo_academico as $semestre)
                                    <option value="{{ $semestre->id }}">{{ $semestre->nome }}</option>
                                    @endforeach

                                </select>
                                <div class="clearfix"></div>
                                <div class="clearfix"></div>
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
                @if (session('actualizar'))
                <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> disciplina actualizado com sucesso. </a>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                @endif
                @if (session('Apagar'))
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
                                    <th><i class="fa fa-book"></i>DISCIPLINAS</th>
                                    <th><i class="fa fa-user-secret"></i>Nº DE DOCENTES</th>
                                    <th><i class="fa fa-info-circle"></i>CURSOS</th>

                                    <th><i class="fa fa-sliders"></i>OPERAÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($disciplinas as $disciplina)
                                <tr>
                                    <td>{{ $disciplina->nome }}</td>
                                    <td>{{ $disciplina->id }}</td>
                                    <td>{{ $disciplina->id }}</td>

                                    <td class="action-link">
                                        <a class="edit" href="#" title="Edit" data-toggle="modal" data-target="#editDetailModal{{ $disciplina->id }}"><i class="fa fa-edit"></i></a>
                                        <a class="delete" href="#" title="Delete" data-toggle="modal" data-target="#deleteDetailModal{{ $disciplina->id }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>




                                <!--Edit details modal-->
                                <div id="editDetailModal{{ $disciplina->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-edit"></i>EDIT SUBJECT
                                                    DETAILS</h4>
                                            </div>
                                            <div class="modal-body dash-form">
                                                <div class="col-sm-3">
                                                    <label class="clear-top-margin"><i class="fa fa-book"></i>NAME</label>
                                                    <input type="text" placeholder="Name" value="Mathematics" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="clear-top-margin"><i class="fa fa-code"></i>CODE</label>
                                                    <input type="text" placeholder="Code" value="MTH101" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="clear-top-margin"><i class="fa fa-book"></i>CLASS</label>
                                                    <select>
                                                        <option>-- Select --</option>
                                                        <option>5 STD</option>
                                                        <option>6 STD</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="clear-top-margin"><i class="fa fa-user-secret"></i>TEACHER</label>
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
                                                    <a href="#" class="save"><i class="fa fa-check"></i>SAVE</a>
                                                    <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>
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
