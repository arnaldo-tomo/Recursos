@extends('layouts.principal_admin')
@section('conteudo')
    <div class="row">
        <div class="col-lg-4 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-calendar"></i>Configuração do sistema </h5>
            <div class="section-divider"></div>


        </div>
    </div>



    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-sm-6">
                @if (session('periodo'))
                    <div class="alert alert-card alert-success" role="alert">
                        {{ session('periodo') }}
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

                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-plus-circle"></i>Semestre</h6>
                    <div class="inner-item">
                        <a class="btn btn-primary" href="#" title="Edit" data-toggle="modal"
                            data-target="#editDetailModal">Registar Perido</a>
                        <!--Edit details modal-->
                        <div id="editDetailModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-edit"></i>Registar Periodo
                                        </h4>
                                    </div>
                                    <form action="/Salvar_Periodo_academico" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body dash-form">
                                            <div class="col-sm-4">
                                                <label class="clear-top-margin"><i
                                                        class="fa fa-calendar"></i>PERÍODO</label>


                                                <input type="text" required value="{{ 'nome' }}" name="nome"
                                                    placeholder="Informe o periodo" value="">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="clear-top-margin"><i class="fa fa-book"></i>DESCRIÇÃO</label>
                                                <input required value="{{ 'Descricao' }}" name="Descricao"
                                                    placeholder="Descrição do Periodo" value="">
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="table-action-box">

                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-check"></i>Seguinte</button>
                                                <a href="#" class="cancel" data-dismiss="modal"><i
                                                        class="fa fa-ban"></i>Sair</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-id-card"></i>PERÍODO</th>
                                    <th><i class="fa fa-id-card"></i>DESCRIÇÃO</th>


                                    <th><i class="fa fa-tasks"></i>OPERAÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Periodo_academico as $dado)
                                    <tr>
                                        <td>{{ $dado->nome }}</td>
                                        <td>{{ $dado->descricao }}</td>
                                        <td class="action-link">
                                            <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                data-target="#editDetailModal{{ $dado->id }}"><i
                                                    class="fa fa-edit"></i></a>

                                            <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                data-target="#deleteDetailModal{{ $dado->id }}"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    {{-- Editar Modal --}}
                                    <div id="editDetailModal{{ $dado->id }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><i class="fa fa-edit"></i>Editar Periodo
                                                    </h4>
                                                </div>
                                                <form action="{{ url('Update_Periodo_academico/' . $dado->id) }}"
                                                    method="put" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body dash-form">
                                                        <div class="col-sm-4">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-calendar"></i>PERÍODO</label>


                                                            <input type="text" required value="{{ 'nome' }}"
                                                                name="nome" placeholder="Informe o periodo"
                                                                value="{{ $dado->nome }}">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="clear-top-margin"><i
                                                                    class="fa fa-book"></i>DESCRIÇÃO</label>
                                                            <input required value="{{ 'descricao' }}" name="descricao"
                                                                placeholder="Descrição do Periodo"
                                                                value="{{ $dado->descricao }}">
                                                        </div>

                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="table-action-box">

                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-check"></i>Actulizar</button>
                                                            <a href="#" class="cancel" data-dismiss="modal"><i
                                                                    class="fa fa-ban"></i>Sair</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Delete Modal -->
                                    <div id="deleteDetailModal{{ $dado->id }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header text-danger">
                                                    <button type="button" class="close "
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar Periodo</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Deseja realmente excluir {{ $dado->nome }}?</label>
                                                    <div class="table-action-box">
                                                        <a href="{{ route('Delete_Periodo_academico', $dado->id) }}"
                                                            class="save"><i class="fa fa-check"></i>Sim</a>
                                                        <a href="#" class="cancel" data-dismiss="modal"><i
                                                                class="fa fa-trash"></i>Cancelar</a>
                                                    </div>
                                                    <div class="clearfix"></div>
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


            <div class="col-sm-6">
                @if (session('modulo'))
                    <div class="alert alert-card alert-success" role="alert">
                        {{ session('modulo') }}
                    </div>
                @endif
                <div id="editDetailModal1" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-edit"></i>Registar Módulo
                                </h4>
                            </div>

                            <form action="/Salvar_modulo_academico" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body dash-form">
                                    <div class="col-sm-4">
                                        <label class="clear-top-margin"><i class="fa fa-calendar"></i>Módulo</label>


                                        <input type="text" required value="{{ 'nome' }}" name="nome"
                                            placeholder="Informe o Módulo">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="clear-top-margin"><i class="fa fa-book"></i>DESCRIÇÃO</label>
                                        <input required value="{{ 'descricao' }}" name="descricao"
                                            placeholder="Descrição Do Módulo">
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="modal-footer">
                                    <div class="table-action-box">

                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-check"></i>Seguinte</button>
                                        <a href="#" class="cancel" data-dismiss="modal"><i
                                                class="fa fa-ban"></i>Sair</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-plus-circle"></i>Módulo</h6>
                    <div class="inner-item">

                        <a class="btn btn-primary" href="#" title="Edit" data-toggle="modal"
                            data-target="#editDetailModal1">Registar Módulo</a>

                        <table id="table_id" class="display" class="display responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th><i class="fa fa-id-card"></i>Módulo</th>
                                    <th><i class="fa fa-id-card"></i>DESCRIÇÃO</th>
                                    <th><i class="fa fa-tasks"></i>OPERAÇÕES</th>
                                </tr>
                            <tbody>
                                @foreach ($Periodo_modulo as $dado)
                                    <tr>
                                        <td>{{ $dado->nome }}</td>
                                        <td>{{ $dado->descricao }}</td>
                                        <td class="action-link">
                                            <a class="edit" href="" title="Edit" data-toggle="modal"
                                                data-target="#editDetailModal2{{ $dado->id }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                data-target="#deleteDetailModal{{ $dado->id }}"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>




                                        <!-- Delete Modal -->
                                        <div id="deleteDetailModal{{ $dado->id }}" class="modal fade"
                                            role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header text-danger">
                                                        <button type="button" class="close "
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar Módulo
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Deseja realmente excluir {{ $dado->nome }}?</label>
                                                        <div class="table-action-box">
                                                            <a href="{{ route('Delete_Modulo_academico', $dado->id) }}"
                                                                class="save"><i class="fa fa-check"></i>Sim</a>
                                                            <a href="#" class="cancel" data-dismiss="modal"><i
                                                                    class="fa fa-trash"></i>Cancelar</a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MOdal editar Modulo --}}
                                        <div id="editDetailModal2{{ $dado->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-edit"></i>Editar Módulo
                                                        </h4>
                                                    </div>
                                                    <form action="{{ url('Update_modulo_academico/' . $dado->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body dash-form">
                                                            <div class="col-sm-4">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-calendar"></i>Módulo</label>


                                                                <input type="text" required
                                                                    value="{{ 'nome' }}" name="nome"
                                                                    placeholder="Informe o periodo"
                                                                    value="{{ $dado->nome }}">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-book"></i>DESCRIÇÃO</label>
                                                                <input required value="{{ 'descricao' }}"
                                                                    name="descricao" placeholder="Descrição do Módulo "
                                                                    value="{{ $dado->descricao }}">
                                                            </div>

                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="table-action-box">

                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-check"></i>Actulizar</button>
                                                                <a href="#" class="cancel" data-dismiss="modal"><i
                                                                        class="fa fa-ban"></i>Sair</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                            </thead>

                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
@endsection
