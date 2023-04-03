@extends('layouts.principal_admin')
@section('conteudo')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-user-secret"></i>INFORMAÇÃO DO DOCENTE</h5>
                <div class="section-divider"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-b-0">
                    <h4 class="card-title">Docente: <b>{{ $user->name }}</b></h4>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs " role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home2"
                            role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                class="hidden-xs-down">Dados Internos</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab"><span
                                class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down"> Dados
                                Pessoas</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab"><span
                                class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Dados
                                Academicos</span></a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane P-20 active" id="home2" role="tabpanel">

                        <div class="dash-item first-dash-item">
                            <div class="inner-item">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-graduation-cap"></i>CURSOS</th>
                                            <th><i class="fa fa-building"></i>TURMAS</th>
                                            <th><i class="fa fa-file"></i>DISCIPLINAS</th>
                                            <th><i class="fa fa-level-up"></i>NÍVELS</th>
                                            <th><i class="fa fa-adjust"></i>PERIODO</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="col">
                                                    <br>
                                                    <hr> {{ $dados_academicos->curso }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col">
                                                    @foreach ($dados_academicos->turmas as $item)
                                                        <br>
                                                        <hr> {{ $item->turma }}
                                                    @endforeach
                                                </div>
                                            </td>

                                            <td>
                                                <div class="col">
                                                    @foreach ($dados_academicos->disciplinas as $item)
                                                        <br>
                                                        <hr>{{ $item->nome }}
                                                    @endforeach
                                                </div>
                                            </td>

                                            <td>
                                                @foreach ($dados_academicos->Nivels as $item)
                                                    <br>
                                                    <hr>{{ $item->nivel }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($dados_academicos->Periodos as $item)
                                                    <br>
                                                    <hr> {{ $item->nome }}
                                                @endforeach
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane  p-20" id="profile2" role="tabpanel">

                        <table id="table_id" class="display" class="display responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>MORADA 1</th>
                                    <th>NACIONALIDADE</th>
                                    <th>DATA DE NASCIMENTO</th>
                                    <th>LOCALIDADE</th>
                                    <th>PRONOVINCIA</th>
                                    <th>EMAIL</th>
                                    <th>TELEFONE</th>
                                    <th>TELEFONE ALTERNATIVO</th>
                                    <th>BILHETE DE IDENTIDADE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                                <td>{{ $dados_contacto->morada }}</td>
                                <td>{{ $dados_contacto->nacionalidade }}</td>
                                <td>{{ $user->data_nasc }}</td>
                                <td>{{ $dados_contacto->localidade }}</td>
                                <td>{{ $dados_contacto->provincia }}</td>
                                <td>{{ $dados_contacto->email }}</td>
                                <td>{{ $user->contacto }}</td>
                                <td>{{ $user->contacto_alternativo }}</td>
                                <td>{{ $user->bilhete_identificacao }}</td>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" id="messages2" role="tabpanel">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Area de Formacao</th>
                                    <th>Nivel Camedico</th>
                                    <th>Universidade</th>
                                    <th>Ano de Conclusao</th>
                                    <th>Media</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $dados_academicos->codigo }}</td>
                                    <td>{{ $dados_academicos->area_formacao }}</td>
                                    <td>{{ $dados_academicos->nivel_academico->nome }}</td>
                                    <td>{{ $dados_academicos->universidade->nome }}</td>
                                    <td>{{ $dados_academicos->ano_conclusao }}</td>
                                    <td>{{ $dados_academicos->media }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
