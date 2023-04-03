@extends('layouts.principal_admin')
@section('conteudo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-sliders"></i>Propinas</h5>
                <div class="section-divider"></div>
            </div>
        </div>


        @if (session('curso'))
            <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong>
                Propina criado com sucesso.
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
                <div class="col-sm-3">
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-plus-circle"></i>NOVA PROPINA</h6>
                        <div class="inner-item">
                            <form action="/salvar_propina" method="POST">
                                @csrf
                                <div class="dash-form">
                                    <label class="clear-top-margin"><i class="fa fa-book"></i>VALOR</label>
                                    <input type="text" required value="{{ old('valor') }}" name="valor"
                                        placeholder="" />
                                    <label><i class="fa fa-calendar"></i>DATA inicio</label>
                                    <input type="date" required value="{{ old('data') }}" name="data"
                                        placeholder="" />
                                    <label class="clear-top-margin"><i class="fa fa-calendar"></i>DIAS</label>
                                    <input type="text" required value="{{ old('dias') }}" name="dias"
                                        placeholder="" />
                                    <label><i class="fa fa-code"></i>DESCRIÇÃO</label>
                                    <textarea required value="{{ old('descricao') }}" name="descricao" id="" cols="30" rows="10"></textarea>
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
                <div class="col-sm-9">
                    @if (session('actualizar'))
                        <div class="alert alert-card alert-success" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> Propina actualizado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    @if (session('Apagar'))
                        <div class="alert alert-card alert-danger" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> Propina eliminado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-sliders"></i>TODAS PROPINAS</h6>
                        <div class="inner-item">
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-book"></i>VALOR</th>
                                        <th><i class="fa fa-code"></i>Descrição</th>
                                        <th><i class="fa fa-user-secret"></i>DATA LIMITE</th>
                                        <th><i class="fa fa-sliders"></i>OPERAÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($propinas as $propina)
                                        <tr>
                                            <td>{{ $propina->Valor }}</td>
                                            <td>{{ $propina->Descricao }}</td>
                                            <td>{{ $propina->Data_limite }}</td>
                                            <td class="action-link">
                                                <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                    data-target="#editDetailModal{{ $propina->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                    data-target="#deleteDetailModal{{ $propina->id }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Delete Modal -->
                                        <div id="deleteDetailModal{{ $propina->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar curso
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Deseja realmente excluir?</label>
                                                        <div class="table-action-box">
                                                            <a href="{{ route('apagar_propina', ['id' => $propina->id]) }}"
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
                                        <div id="editDetailModal{{ $propina->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-edit"></i>Editar propina
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body dash-form">
                                                        <form
                                                            action="{{ route('actualizar_propina', ['id' => $propina->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="col-sm-4">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-book"></i>Valor</label>
                                                                <input type="text" required
                                                                    value="{{ old('valor') }}" name="valor"
                                                                    value="{{ $propina->Valor }}" />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-book"></i>Data limite</label>
                                                                <input type="date" required
                                                                    value="{{ old('data') }}" name="data"
                                                                    value="{{ $propina->Data_limite }}" />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-user-secret"></i>Descrição</label>

                                                                <textarea required value="{{ old('descricao') }}" name="descricao" id="" cols="30" rows="10"
                                                                    value="{{ $propina->Descricao }}"></textarea>
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
