@extends('layouts.principal_admin')
@section('conteudo')
    {{-- <div class="container"> --}}
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-cogs"></i>DISCIPLINAS</h5>
            <div class="section-divider"></div>
        </div>
    </div>

    @if (session('mensagem'))
        <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong>
            Disciplina criada com sucesso.
            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger role">
                <div class="display">
                    <strong> {{ $error }}</strong>
                </div>
            </div>
        @endforeach
    @endif

    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-sm-4">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-plus-circle"></i>NOVA DISCIPLINA</h6>
                    <div class="inner-item">
                        <form action="/salvar_disciplina" method="POST">
                            @csrf
                            <div class="dash-form">
                                <label class="clear-top-margin"><i class="fa fa-book"></i>NOME</label>
                                <input type="text" required value="{{ old('nome') }}" name="nome"
                                    placeholder="Nome da disciplina" />
                                <label><i class="fa fa-code"></i>CÓDIGO</label>
                                <input type="text" required value="{{ old('codigo') }}" name="codigo"
                                    placeholder="MTH101" />
                                <label><i class="fa fa-info-circle"></i>DESCRIÇÃO</label>
                                <textarea required value="{{ old('descricao') }}" name="descricao" placeholder="Escreva a descrição"></textarea>
                                <div class="clearfix"></div>
                                <br>
                                <div>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i>
                                        CRIAR</button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-sliders"></i>TODAS DISCIPLINAS</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-book"></i>NOME</th>
                                    <th><i class="fa fa-code"></i>CÓDIGO</th>
                                    <th><i class="fa fa-user-secret"></i>Nº DE DOCENTES</th>
                                    <th><i class="fa fa-info-circle"></i>DESCRIÇÃO</th>
                                    <th><i class="fa fa-sliders"></i>OPERAÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($disciplinas as $disciplina)
                                    <tr>
                                        <td>{{ $disciplina->nome }}</td>
                                        <td>{{ $disciplina->codigo }}</td>
                                        <td>{{ sizeof($disciplina->docentes) }}</td>
                                        <td>{{ $disciplina->descricao }}</td>
                                        <td class="action-link">
                                            <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                data-target="#editDetailModal{{ $disciplina->id }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                data-target="#deleteDetailModal{{ $disciplina->id }}"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>



                                    <!-- Delete Modal -->
                                    <div id="deleteDetailModal{{ $disciplina->id }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar disciplina
                                                    </h4>
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
                                    <div id="editDetailModal{{ $disciplina->id }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><i class="fa fa-edit"></i>EDITAR
                                                        DISCIPLINA</h4>
                                                </div>
                                                <div class="modal-body dash-form">
                                                    <form
                                                        action="{{ route('actualizar_disciplina', ['id' => $disciplina->id]) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="col-sm-6">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-book"></i>Nome</label>
                                                            <input type="text" name="nome"
                                                                value="{{ $disciplina->nome }}" />
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-code"></i>Codigo</label>
                                                            <input type="text" name="codigo"
                                                                value="{{ $disciplina->codigo }}" />
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-sm-12">
                                                            <label><i class="fa fa-info-circle"></i>DESCRIÇÃO</label>
                                                            <textarea name="descricao">{{ $disciplina->descricao }}</textarea>
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
                                            </form>
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
