@extends('layouts.principal_admin')
@section('conteudo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-bar-money"></i>HONORÁRIOS</h5>
                <div class="section-divider"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-search"></i>VER STATUS DA TAXA</h6>
                    <div class="inner-item dash-search-form">
                        <form action="/pesquisar_pagamento_estudante" method="POST">
                            @csrf
                            <div class="col-sm-3">
                                <label>CURSO</label>
                                <select name="curso_id" id="curso_id" onchange="turmas_disciplinas(this)">
                                    <option value="">Selecione</option>
                                    @foreach ($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->codigo }}-{{ $curso->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>TURMA</label>
                                <select name="turma_id" id="turma_id" onchange="estudantes_turma(this)">
                                    <option>--Selecione--</option>
                                    @foreach ($turmas as $turma)
                                        <option value="{{ $turma->id }}">{{ $turma->turma }}-{{ $turma->codigo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="submit-btn"><i class="fa fa-search"></i>Procurar</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>


                </div>
            </div>
            <div class="col-lg-12">
                @if (session('pagamentos'))
                    <div class="dash-item">
                        <h6 class="item-title"><i class="fa fa-info-circle"></i>Detalhe da propina - Estudante:
                            {{ session('estudante')->estudante->name }} {{ session('estudante')->estudante->apelido }}</h6>
                        <div class="inner-item">
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i>Estudante</th>
                                        <th><i class="fa fa-book"></i>Curso</th>
                                        <th><i class="fa fa-money"></i>Valor</th>
                                        <th><i class="fa fa-calendar"></i>Data limite</th>
                                        <th><i class="fa fa-calendar"></i>Data de pagamento</th>
                                        <th><i class="fa fa-calendar"></i>Referente a</th>
                                        <th><i class="fa fa-cogs"></i>Metodo de pagamento</th>
                                        <th><i class="fa fa-check"></i>Estado</th>
                                        <th><i class="fa fa-ban"></i>Operações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('pagamentos') as $pagamento)
                                        <tr>
                                            <td>{{ session('estudante')->estudante->name }}
                                                {{ session('estudante')->estudante->apelido }}</td>
                                            <td>{{ session('curso')->nome }}</td>
                                            <td>{{ session('curso')->propina->Valor }}</td>
                                            <td>{{ session('curso')->propina->Data_limite }}</td>
                                            <td>{{ $pagamento->Data_pagamento }}</td>
                                            <td>{{ $pagamento->mes->Mes }}</td>
                                            @if (isset($pagamento->tpagamento))
                                                <td>{{ $pagamento->tpagamento->nome }}</td>
                                            @else
                                                <td>--</td>
                                            @endif
                                            @if ($pagamento->Estado == 0)
                                                <td class="text-danger">
                                                    Não Pago
                                                </td>
                                            @else
                                                <td class="text-success">
                                                    Pago
                                                </td>
                                            @endif
                                            <td class="action-link">
                                                <a href="#"><i class="fa fa-download"></i></a>
                                                <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                    data-target="#editDetailModal{{ $pagamento->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        <!--Edit details modal-->
                                        <div id="editDetailModal{{ $pagamento->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-edit"></i>Editar pagamento
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body dash-form">
                                                        <form
                                                            action="{{ route('actualizar_pagamento', ['id' => $pagamento->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-edit"></i>NOME</label>
                                                                <input type="text"
                                                                    value="{{ session('estudante')->estudante->name }} {{ session('estudante')->estudante->apelido }}"
                                                                    disabled />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-edit"></i>Curso</label>
                                                                <input type="text" value="{{ session('curso')->nome }}"
                                                                    disabled />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-edit"></i>Valor</label>
                                                                <input type="text"
                                                                    value="{{ session('curso')->propina->Valor }}"
                                                                    disabled />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-edit"></i>Data limite</label>
                                                                <input type="text"
                                                                    value="{{ session('curso')->propina->Data_limite }}"
                                                                    disabled />
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-edit"></i>Data de pagamento</label>
                                                                <input type="date" name="data_pagamento"
                                                                    value="{{ $pagamento->Data_pagamento }}" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-cogs"></i>Tipo pagamento</label>
                                                                <select name="tpagamento_id" id="tpagamento_id">
                                                                    <option value="">Escolher</option>
                                                                    @foreach (session('tpagamento') as $tpagamento)
                                                                        <option value="{{ $tpagamento->id }}">
                                                                            {{ $tpagamento->nome }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-cogs"></i>Mes</label>
                                                                <select name="mes_id" id="mes_id">
                                                                    <option value="{{ $pagamento->mes->id }}">
                                                                        {{ $pagamento->mes->Mes }}</option>
                                                                    @foreach (session('meses') as $mes)
                                                                        <option value="{{ $mes->id }}">
                                                                            {{ $mes->Mes }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-puzzle-piece"></i>Estado</label>
                                                                <select id="estado" name="estado">
                                                                    <option value="{{ $pagamento->Estado }}">
                                                                        @if ($pagamento->Estado == 0)
                                                                            Não Pago
                                                                        @else
                                                                            Pago
                                                                        @endif
                                                                    </option>
                                                                    <option value="0">Não pago</option>
                                                                    <option value="1">Pago</option>

                                                                </select>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="table-action-box">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa fa-check"></i> Actualizar</button>
                                                            <a href="#" class="cancel" data-dismiss="modal"><i
                                                                    class="fa fa-ban"></i> Sair</a>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="dash-item">
                                <h6 class="item-title"><i class="fa fa-info-circle"></i>NENHUM ITEM SELECIONADO</h6>
                            </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

@endsection
