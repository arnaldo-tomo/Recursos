@extends('layouts.principal_admin')
@section('conteudo')
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-user"></i>INSCRIÇÕES ({{ $estudante->estudante->name }}
                {{ $estudante->estudante->apelido }}) </h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                @if (session('inscricao_matricula'))
                    <div class="alert alert-card alert-danger" role="alert"><strong
                            class="text-capitalize">Atenção!</strong> Estudante sem matrícula renovada. </a>
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


                    <div class="inner-item">
                        <a class="btn btn-primary" href="#" title="Edit" data-toggle="modal"
                            data-target="#editDetailModal">Nova Inscrição</a>

                        <!--Edit details modal-->
                        <div id="editDetailModal" class="modal fade" role="dialog" style="width: 100%">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-edit"></i>Inscrever
                                            {{ $estudante->estudante->name }} {{ $estudante->estudante->apelido }}</h4>
                                    </div>
                                    <form action="/nova_inscricao" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body dash-form">
                                            <div class="col-sm-3">
                                                <label class="clear-top-margin"><i class="fa fa-user"></i>ANO
                                                    LECTIVO</label>

                                                <select name="ano_letivo_id" id="ano_letivo_id" readonly>

                                                    <option value="{{ $ano_letivo->id }}">{{ $ano_letivo->Ano }}</option>

                                                </select>
                                            </div>
                                            <input type="hidden" name="estudante_id" value="{{ $estudante->id }}">
                                            <div class="col-sm-3">
                                                <label class="clear-top-margin"><i class="fa fa-book"></i>PERÍODO</label>
                                                <select name="periodo_id" id="periodo_id">

                                                    @foreach ($periodos as $periodo)
                                                        <option value="{{ $periodo->id }}">{{ $periodo->nome }}</option>
                                                    @endforeach

                                                </select>

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
                                    <th><i class="fa fa-calendar"></i>DATA INSCRIÇÃO</th>
                                    <th><i class="fa fa-calendar"></i>ANO LECTIVO</th>
                                    <th><i class="fa fa-id-card"></i>NÍVEL</th>
                                    <th><i class="fa fa-id-card"></i>PERÍODO</th>


                                    <th><i class="fa fa-tasks"></i>OPERAÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($estudante->inscricoes as $inscricao)
                                    <tr>
                                        <td>{{ $inscricao->data }}</td>
                                        <td>{{ $inscricao->ano_lectivo->Ano }}</td>
                                        <td>{{ $inscricao->nivel->nivel }}</td>
                                        <td>{{ $inscricao->periodo->nome }}</td>


                                        <td class="">
                                            <a class="" href="">Ver</a>

                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
