@extends('layouts.principal_admin')
@section('conteudo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-user-secret"></i>TODOS DOCENTES</h5>
                <div class="section-divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="col-lg-12">
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-user"></i>DOCENTES</h6>
                        <div class="inner-item">
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i>APELIDO</th>
                                        <th><i class="fa fa-user"></i>OUTROS NOMES</th>
                                        <th><i class="fa fa-graduation-cap"></i>NÍVEL ACADÉMICO</th>
                                        <th><i class="fa fa-building"></i>UNIVERSIDADE</th>
                                        <th><i class="fa fa-calendar"></i>ANO DE CONCLUSÃO</th>
                                        <th><i class="fa fa-phone"></i>CONTACTO</th>
                                        <th><i class="fa fa-envelope-o"></i>E-MAIL</th>
                                        <th><i class="fa fa-tasks"></i>OPERAÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docentes as $docente)
                                        <tr>
                                            <td>{{ $docente->docente->apelido }}</td>
                                            <td>{{ $docente->docente->name }}</td>
                                            <td>{{ $docente->nivel_academico->nome }}</td>
                                            <td>{{ $docente->universidade->nome }}</td>
                                            <td>{{ $docente->ano_conclusao }}</td>
                                            <td>{{ $docente->docente->contacto }}</td>
                                            <td>{{ $docente->docente->email }}</td>
                                            <td class="action-link">
                                                <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                    data-target="#editDetailModal{{ $docente->docente->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                    data-target="#deleteDetailModal{{ $docente->docente->id }}"><i
                                                        class="fa fa-trash"></i></a>

                                                <a class="edit" href="detalhes_docente{{ $docente->docente->id }}">
                                                    <i class="fa fa-tasks"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Delete Modal -->
                                        <div id="deleteDetailModal{{ $docente->docente->id }}" class="modal fade"
                                            role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar docente
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Deseja realmente excluir docente
                                                            {{ $docente->docente->name }}
                                                            {{ $docente->docente->apelido }}?</label>
                                                        <div class="table-action-box">
                                                            <a href="{{ route('apagar_docente', ['id' => $docente->docente->id]) }}"
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
                                        <div id="editDetailModal{{ $docente->docente->id }}" class="modal fade"
                                            role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-edit"></i>EDITAR DADOS DO
                                                            DOCENTE</h4>
                                                    </div>
                                                    <form
                                                        action="{{ route('actualizar_docente', ['id' => $docente->docente->id]) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body dash-form">
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-user"></i>OUTROS NOMES</label>
                                                                <input type="text" placeholder="OUTROS NOMES"
                                                                    name="name"
                                                                    id="name"value="{{ $docente->docente->name }}"
                                                                    required />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-user"></i>APELIDO</label>
                                                                <input type="text" placeholder="APELIDO" name="apelido"
                                                                    value="{{ $docente->docente->apelido }}" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-graduation-cap"></i>NÍVEL
                                                                    ACADÉMICO</label>
                                                                <select name="nivel_academico_id">
                                                                    <option value="{{ $docente->nivel_academico->id }}">
                                                                        {{ $docente->nivel_academico->nome }}</option>
                                                                    @foreach ($niveis_academicos as $nivel)
                                                                        <option value="{{ $nivel->id }}">
                                                                            {{ $nivel->nome }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-building"></i>UNIVERSIDADE</label>
                                                                <select name="universidade_id">
                                                                    <option value="{{ $docente->universidade->id }}">
                                                                        {{ $docente->universidade->nome }}</option>
                                                                    @foreach ($universidades as $universidade)
                                                                        <option value="{{ $universidade->id }}">
                                                                            {{ $universidade->nome }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-calaendar"></i>ANO DE
                                                                    CONCLUSÃO</label>
                                                                <input type="year" name="ano_conclusao"
                                                                    placeholder="ex. 2010"
                                                                    value="{{ $docente->ano_conclusao }}" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-puzzle-piece"></i>GÉNERO</label>
                                                                <select id="genero_id" name="genero_id">
                                                                    <option value="{{ $docente->docente->genero->id }}">
                                                                        {{ $docente->docente->genero->nome }}</option>
                                                                    @foreach ($generos as $genero)
                                                                        <option value="{{ $genero->id }}">
                                                                            {{ $genero->nome }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-phone"></i>CONTACTO</label>
                                                                <input type="text" placeholder="840000000"
                                                                    name="contacto"
                                                                    value="{{ $docente->docente->contacto }}" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-envelope-o"></i>E-MAIL</label>
                                                                <input type="text" placeholder="Email" name="email"
                                                                    value="{{ $docente->docente->email }}" />
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
    </div>
@endsection
