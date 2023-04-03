@extends('layouts.principal_admin')
@section('conteudo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-users"></i>TIPOS AVALIAÇÃO</h5>
                <div class="section-divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="col-xs-3">
                    @if (session('avaliacao'))
                        <div class="alert alert-card alert-success" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> tipo de avaliação criado com sucesso.
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-edit"></i>NOVO TIPO AVALIAÇÃO</h6>
                        <form action="/criar_tipo_avaliacao" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="inner-item">
                                <div class="dash-form">

                                    <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>NOME</label>
                                    <input type="text" placeholder="Ex. ACS" name="name" id="name" required />

                                    <div class="clearfix"></div>
                                    <br>
                                    <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>PESO DA
                                        AVALIAÇÃO</label>
                                    <input type="text" placeholder="Ex. 20%" name="peso" id="peso" required />

                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="col-sm-12">

                                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i>
                                            CRIAR</button>

                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-9">
                    @if (session('actualizar'))
                        <div class="alert alert-card alert-success" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> tipo de avaliação actualizado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    @if (session('Apagar'))
                        <div class="alert alert-card alert-danger" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> tipo de avaliação eliminado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-user"></i>TIPOS AVALIAÇÃO</h6>
                        <div class="inner-item">
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>

                                        <th><i class="fa fa-id-card"></i>CÓDIGO #</th>
                                        <th><i class="fa fa-user"></i>TIPO DE AVALIAÇÃO</th>
                                        <th><i class="fa fa-user"></i>PESO DA AVALIAÇÃO</th>

                                        <th><i class="fa fa-tasks"></i>OPERAÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tipos_avaliacao as $tipo_avaliacao)
                                        <tr>
                                            <td>{{ $tipo_avaliacao->id }}</td>
                                            <td>{{ $tipo_avaliacao->nome }}</td>
                                            <td>{{ $tipo_avaliacao->peso_avaliacao }}%</td>
                                            <td class="action-link">
                                                <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                    data-target="#editDetailModal{{ $tipo_avaliacao->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                    data-target="#deleteDetailModal{{ $tipo_avaliacao->id }}"><i
                                                        class="fa fa-remove"></i></a>
                                            </td>
                                        </tr>



                                        <!-- Delete Modal -->
                                        <div id="deleteDetailModal{{ $tipo_avaliacao->id }}" class="modal fade"
                                            role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar tipo
                                                            avaliacao</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Deseja realmente excluir {{ $tipo_avaliacao->nome }}?</label>
                                                        <div class="table-action-box">
                                                            <a href="{{ route('apagar_tipo_avaliacao', ['id' => $tipo_avaliacao->id]) }}"
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
                                        <div id="editDetailModal{{ $tipo_avaliacao->id }}" class="modal fade"
                                            role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-edit"></i>EDITAR TIPO
                                                            AVALIAÇÃO</h4>
                                                    </div>
                                                    <form
                                                        action="{{ route('actualizar_tipo_avaliacao', ['id' => $tipo_avaliacao->id]) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body dash-form">
                                                            <div class="col-sm-6">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-user-circle-o"></i>NOME</label>
                                                                <input type="text" placeholder="Ex. ACS"
                                                                    name="name" id="name"
                                                                    value="{{ $tipo_avaliacao->nome }}" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-user-circle-o"></i>PESO DA
                                                                    AVALIAÇÃO</label>
                                                                <input type="text" placeholder="Ex. 20%"
                                                                    name="peso" id="peso"
                                                                    value="{{ $tipo_avaliacao->peso_avaliacao }}" />
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
