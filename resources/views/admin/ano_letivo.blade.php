@extends('layouts.principal_admin')
@section('conteudo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-calendar"></i>ANO LECTIVO</h5>
                <div class="section-divider"></div>
            </div>
        </div>

        @if (session('ano_existente'))
            <div class="alert alert-card alert-danger" role="alert"><strong class="text-capitalize">Atenção!</strong> ano
                letivo ja foi iniciado. </a>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif
        @if (session('ano'))
            <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong>
                ano letivo iniciado com sucesso. </a>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif
        <div class="row">

            <div class="col-lg-12 clear-padding-xs">
                <div class="dash-item first-dash-item">
                    <div class="col-sm-4">

                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-plus-circle"></i>NOVO ANO LECTIVO</h6>
                            <form action="/salvar_ano_lectivo" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="inner-item">
                                    <div class="dash-form">
                                        <label class="clear-top-margin"><i class="fa fa-calendar"></i>Ano</label>
                                        <input type="text" name="ano_letivo" value="{{ date('Y') }}" required>



                                        <label><i class="fa fa-info-circle"></i>DESCRIÇÃO</label>
                                        <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror" focus
                                            value="{{ old('descricao') }}" placeholder="Escreva a descrição"></textarea>
                                        @error('descricao')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <label class=""><i class="fa fa-clock"></i>INÍCIO DAS AULAS</label>
                                        <input type="date"
                                            class="form-control @error('inicio_aulas') is-invalid @enderror"
                                            value="{{ old('inicio_aulas') }}" name="inicio_aulas"
                                            placeholder="INÍCIO DAS AULAS" />
                                        @error('inicio_aulas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <label class=""><i class="fa fa-clock"></i>TÉRMINO DAS AULAS</label>
                                        <input type="date"
                                            class="form-control @error('termino_aulas') is-invalid @enderror"
                                            value="{{ old('termino_aulas') }}" name="termino_aulas" placeholder="" />
                                        @error('termino_aulas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="clearfix"></div>
                                        <br>
                                        <div>

                                            <button type="submit" class="btn btn-success"><i
                                                    class="fa fa-start"></i>INICIAR
                                                ANO LECTIVO</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        @if (session('actualizar'))
                            <div class="alert alert-card alert-success" role="alert"><strong
                                    class="text-capitalize">Parabens!</strong> anúncio actualizado com sucesso. </a>
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                        @endif
                        @if (session('Apagar'))
                            <div class="alert alert-card alert-danger" role="alert"><strong
                                    class="text-capitalize">Parabens!</strong> anúncio eliminado com sucesso. </a>
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                        @endif
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-bullhorn"></i>ANOS LECTIVOS</h6>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-cogs"></i>ANO LECTIVO</th>
                                            <th><i class="fa fa-users"></i>NR ESTUDANTES</th>
                                            <th><i class="fa fa-user-info"></i>NR DE CURSOS</th>
                                            <th><i class="fa fa-calendar"></i>INÍCIO DAS AULAS</th>
                                            <th><i class="fa fa-calendar"></i>TÉRMINO DAS AULAS</th>
                                            <th><i class="fa fa-info"></i>ESTADO</th>
                                            <th><i class="fa fa-sliders"></i>OPERAÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anos as $ano)
                                            <tr>
                                                <td>{{ $ano->Ano }}</td>
                                                <td>{{ sizeof($ano->estudantes) }}</td>

                                                <td>{{ sizeof($ano->cursos) }}</td>
                                                <td>{{ $ano->inicio_aulas }}</td>
                                                <td>{{ $ano->termino_aulas }}</td>
                                                <td>
                                                    @if ($ano->estado == 1)
                                                        <span class="green">Iniciado</span>
                                                    @elseif($ano->estado == 2)
                                                        <span class="red">Terminado</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                        data-target="#editDetailModal{{ $ano->id }}">Editar</a>
                                                </td>
                                            </tr>



                                            <!--Edit details modal-->
                                            <div id="editDetailModal{{ $ano->id }}" class="modal fade"
                                                role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <form action="/atualizar_ano_lectivo" method="POST">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title"><i class="fa fa-edit"></i>EDITAR
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body dash-form">
                                                                <div class="col-sm-3">
                                                                    <label class="clear-top-margin"><i
                                                                            class="fa fa-book"></i>ANO LETCTIVO</label>
                                                                    <input type="text" placeholder=""
                                                                        value="{{ $ano->Ano }}" />
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label class="clear-top-margin"><i
                                                                            class="fa fa-calendar"></i>INÍCIO DAS
                                                                        AULAS</label>
                                                                    <input type="date" placeholder=""
                                                                        name="inicio_aulas"
                                                                        value="{{ $ano->inicio_aulas }}" />
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label class="clear-top-margin"><i
                                                                            class="fa fa-calendar"></i>TÉRMINO DAS
                                                                        AULAS</label>
                                                                    <input type="date" placeholder=""
                                                                        name="termino_aulas"
                                                                        value="{{ $ano->termino_aulas }}" />
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label class="clear-top-margin"><i
                                                                            class="fa fa-info-circle"></i>ESTADO</label>
                                                                    <select name="" id="">
                                                                        <option value="1">Iniciado</option>
                                                                        <option value="2">Terminado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="clearfix"></div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="table-action-box">

                                                                    <button class="btn btn-success" type="submit"><i
                                                                            class="fa fa-check"></i>SALVAR</button>
                                                                    <a href="#" class="cancel"
                                                                        data-dismiss="modal"><i
                                                                            class="fa fa-ban"></i>FECHAR</a>
                                                                </div>
                                                            </div>
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
    </div>

    </div>
@endsection
