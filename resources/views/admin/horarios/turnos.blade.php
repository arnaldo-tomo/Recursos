@extends('layouts.principal_admin')
@section('conteudo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-cogs"></i>TURNOS</h5>
                <div class="section-divider"></div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="col-sm-4">

                    @if (session('turno'))
                        <div class="alert alert-card alert-success" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> turno criado com sucesso.
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-plus-circle"></i>NOVO TURNO</h6>
                        <div class="inner-item">
                            <form action="/salvar_turno" method="POST">
                                @csrf
                                <div class="dash-form">
                                    <label class="clear-top-margin"><i class="fa fa-calendar"></i>PERÍODO</label>
                                    <select name="periodo_id">
                                        <option>-- Selecione --</option>
                                        @foreach ($periodos as $periodo)
                                            <option value="{{ $periodo->id }}">{{ $periodo->nome }}</option>
                                        @endforeach
                                    </select>
                                    <label><i class="fa fa-book"></i>DESCRIÇÃO</label>
                                    <textarea name="descricao" id="" cols="30" rows="3" placeholder="Ex: 1º Turno"></textarea>


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
                    @if (session('actualizar'))
                        <div class="alert alert-card alert-success" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> turma actualizado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    @if (session('Apagar'))
                        <div class="alert alert-card alert-danger" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> turma eliminado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-sliders"></i>TODOS TURNOS</h6>
                        <div class="inner-item">
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-code"></i>PERÍODO</th>
                                        <th><i class="fa fa-cogs"></i>DESCRIÇÃO</th>


                                        <th><i class="fa fa-sliders"></i>OPERAÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($turnos as $turno)
                                        <tr>
                                            <td>{{ $turno->periodo->nome }}</td>
                                            <td>{{ $turno->descricao }}</td>


                                            <td class="action-link">
                                                <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                    data-target="#editDetailModal{{ $turno->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                    data-target="#deleteDetailModal{{ $turno->id }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>


                                        <!-- Delete Modal -->
                                        <div id="deleteDetailModal{{ $turno->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar Turno</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Deseja realmente excluir {{ $turno->descricao }}?</label>
                                                        <div class="table-action-box">
                                                            <a href="{{ route('apagar_turma', ['id' => $turno->id]) }}"
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
                                        <div id="editDetailModal{{ $turno->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-edit"></i>EDITAR TURMA
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body dash-form">
                                                        <form action="{{ route('actualizar_turma', ['id' => $turno->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="col-sm-4">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-user-secret"></i>PERÍODO</label>
                                                                <select name="curso_id">
                                                                    <option value="{{ $turno->periodo_id }}">
                                                                        {{ $turno->periodo->nome }}</option>
                                                                    @foreach ($periodos as $periodo)
                                                                        <option value="{{ $periodo->id }}">
                                                                            {{ $periodo->nome }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-code"></i>DESCRIÇÃO</label>
                                                                <textarea name="descricao">{{ $turno->descricao }}</textarea>
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
