@extends('layouts.principal_admin')
@section('conteudo')
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-users"></i>Inscrição</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                @if (session('matricula'))
                    <div class="alert alert-card alert-success" role="alert"><strong
                            class="text-capitalize">Parabens!</strong> Matricula renovada com sucesso. </a>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                @if (session('actualizar'))
                    <div class="alert alert-card alert-success" role="alert"><strong
                            class="text-capitalize">Parabens!</strong> estudante actualizado com sucesso. </a>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                @if (session('Apagar'))
                    <div class="alert alert-card alert-danger" role="alert"><strong
                            class="text-capitalize">Parabens!</strong> estudante eliminado com sucesso. </a>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-user"></i>ESTUDANTES</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                            width="100%">
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
                                        <td>{{ $estudante->codigo }}</td>
                                        <td>{{ $estudante->estudante->apelido }}</td>
                                        <td>{{ $estudante->estudante->name }}</td>
                                        <td>{{ $estudante->curso->nome }}</td>
                                        <td>
                                            {{ $estudante->ano_lectivo->Ano }}
                                        </td>

                                        <td>{{ $estudante->estudante->email }}</td>
                                        <td class="">
                                            <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                data-target="#editDetailModal{{ $estudante->estudante->id }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="" href="#" title="Delete" data-toggle="modal"
                                                data-target="#matriculaDetailModal{{ $estudante->estudante->id }}">Renovar
                                                matricula</a>
                                            <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                data-target="#deleteDetailModal{{ $estudante->estudante->id }}"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>



                                    <!-- Matricula Modal -->
                                    <div id="matriculaDetailModal{{ $estudante->estudante->id }}" class="modal fade"
                                        role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><i class="fa fa-trash"></i>RENOVAR MATRÍCULA
                                                    </h4>
                                                </div>
                                                <form action="{{ route('renovar_matricula', ['id' => $estudante->id]) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body dash-form">
                                                        <div class="col-sm-6">
                                                            <input type="hidden" name="estudante_id"
                                                                value="{{ $estudante->id }}">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-calendar"></i>SELECIONE O ANO
                                                                LECTIVO</label>
                                                            <select name="ano_letivo_id" id="ano_letivo_id">

                                                                @foreach ($anos as $ano)
                                                                    <option value="{{ $ano->id }}">
                                                                        {{ $ano->Ano }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="clear-top-margin"><i class="fa fa-code"></i>Nº
                                                                TALÃO DE DEPÓSITO</label>
                                                            <input type="text" placeholder="" name="talao"
                                                                id="talao" value="" required />
                                                        </div>
                                                        
                                                        <div class="col-sm-6">
                                                            <br><label class="clear-top-margin"><i class="fa fa-code"></i>VALOR</label>
                                                            <input type="text" placeholder="" name="valor"
                                                                id="valor" value="" required />
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="clearfix"></div>
                                                        <br>

                                                        <div class="col-sm-6">
                                                            <div class="table-action-box">
                                                                <button type="submit" class="btn btn-success"><i
                                                                        class="fa fa-check"></i>Actualizar</button>
                                                                <button href="#" class="cancel"
                                                                    data-dismiss="modal"><i
                                                                        class="fa fa-ban"></i>Sair</button>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div id="deleteDetailModal{{ $estudante->estudante->id }}" class="modal fade"
                                        role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar estudante
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Deseja realmente excluir estudante
                                                        {{ $estudante->estudante->name }}
                                                        {{ $estudante->estudante->apelido }}?</label>
                                                    <div class="table-action-box">
                                                        <a href="{{ route('apagar_estudante', ['id' => $estudante->estudante->id]) }}"
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
                                    <div id="editDetailModal{{ $estudante->estudante->id }}" class="modal fade"
                                        role="dialog" style="width: 100%">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><i class="fa fa-edit"></i>EDITAR DADOS DO
                                                        ESTUDANTE</h4>
                                                </div>
                                                <form
                                                    action="{{ route('actualizar_estudante', ['id' => $estudante->estudante->id]) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body dash-form">
                                                        <div class="col-sm-3">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-user"></i>OUTROS NOMES</label>
                                                            <input type="text" placeholder="OUTROS NOMES"
                                                                name="name"
                                                                id="name"value="{{ $estudante->estudante->name }}"
                                                                required />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-user"></i>APELIDO</label>
                                                            <input type="text" placeholder="APELIDO" name="apelido"
                                                                value="{{ $estudante->estudante->apelido }}" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-calendar"></i>DATA DE NASCIMENTO</label>
                                                            <input type="text" id="studentDOB" name="data_nascimento"
                                                                placeholder="MM/DD/YYYY"
                                                                value="{{ $estudante->estudante->data_nasc }}" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-book"></i>CURSO</label>
                                                            <select name="curso_id" id="curso_id">
                                                                <option value="{{ $estudante->curso->id }}">
                                                                    {{ $estudante->curso->nome }}</option>
                                                                @foreach ($cursos as $curso)
                                                                    <option value="{{ $curso->id }}">
                                                                        {{ $curso->nome }}</option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-sm-3">
                                                            <label><i class="fa fa-cogs"></i>TURMA</label>
                                                            <select name="turma_id" id="turma_id">
                                                                <option value="{{ $estudante->turma->id }}">
                                                                    {{ $estudante->turma->turma }}</option>
                                                                @foreach ($estudante->curso->turmas as $turma)
                                                                    <option value="{{ $turma->id }}">
                                                                        {{ $turma->turma }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label><i class="fa fa-puzzle-piece"></i>GÉNERO</label>
                                                            <select id="genero_id" name="genero_id">
                                                                <option value="{{ $estudante->estudante->genero->id }}">
                                                                    {{ $estudante->estudante->genero->nome }}</option>
                                                                @foreach ($generos as $genero)
                                                                    <option value="{{ $genero->id }}">
                                                                        {{ $genero->nome }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label><i class="fa fa-phone"></i>CONTACTO</label>
                                                            <input type="text" placeholder="840000000" name="contacto"
                                                                value="{{ $estudante->estudante->contacto }}" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label><i class="fa fa-envelope-o"></i>E-MAIL</label>
                                                            <input type="text" placeholder="Email" name="email"
                                                                value="{{ $estudante->estudante->email }}" />
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="table-action-box">

                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa fa-check"></i>Actualizar</button>
                                                            <a href="#" class="cancel" data-dismiss="modal"><i
                                                                    class="fa fa-ban"></i>Sair</a>
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
@endsection
