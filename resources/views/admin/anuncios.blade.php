@extends('layouts.principal_admin')
@section('conteudo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-bullhorn"></i>ANÚNCIOS</h5>
                <div class="section-divider"></div>
            </div>
        </div>
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
                    @if (session('anuncio'))
                        <div class="alert alert-card alert-success" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> anúncio criado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="dash-item first-dash-item" style="background: url('')">
                        <h6 class="item-title"><i class="fa fa-plus-circle"></i>NOVO ANÚNCIO</h6>
                        <form action="/salvar_anuncio" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="inner-item">
                                <div class="dash-form">
                                    <label class="clear-top-margin"><i class="fa fa-cogs"></i>TIPO</label>
                                    <select required value="{{ 'tipo_evento_id' }}" name="tipo_evento_id">
                                        <option>-- Selecione --</option>
                                        @foreach ($tipos_eventos as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                                        @endforeach
                                    </select>
                                    <label><i class="fa fa-user-secret"></i>DESTINATARIO</label>
                                    <select required value="{{ 'destinatario_id' }}" name="destinatario_id">
                                        <option>-- Selecione --</option>
                                        @foreach ($destinatarios as $dest)
                                            <option value="{{ $dest->id }}">{{ $dest->nome }}</option>
                                        @endforeach
                                    </select>
                                    <label><i class="fa fa-code"></i>ASSUNTO</label>
                                    <input type="text" required value="{{ 'assunto' }}" name="assunto"
                                        placeholder="Assunto" />

                                    <label><i class="fa fa-info-circle"></i>DESCRIÇÃO</label>
                                    <textarea required value="{{ 'descricao' }}" name="descricao" placeholder="Escreva a descrição"></textarea>

                                    <label><i class="fa fa-code"></i>IMAGEM</label>
                                    <input type="file" required value="{{ 'imagem' }}" name="imagem"
                                        placeholder="imagem" />
                                    <div class="col-sm-6">
                                        <label class=""><i class="fa fa-alarm"></i>INÍCIO</label>
                                        <input type="datetime" required value="{{ 'inicio' }}" name="inicio"
                                            placeholder="" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class=""><i class="fa fa-alarm"></i>FIM</label>
                                        <input type="datetime" required value="{{ 'fim' }}" name="fim"
                                            placeholder="" />
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div>

                                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i>
                                            CRIAR</button>
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
                        <h6 class="item-title"><i class="fa fa-bullhorn"></i>TODOS ANÚNCIOS</h6>
                        <div class="inner-item">
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-cogs"></i>TIPO</th>
                                        <th><i class="fa fa-user-secret"></i>DESTINATÁRIO</th>
                                        <th><i class="fa fa-user-info"></i>ASSUNTO</th>
                                        <th><i class="fa fa-info-circle"></i>DESCRIÇÃO</th>
                                        <th><i class="fa fa-calendar"></i>EXPIRA EM</th>
                                        <th><i class="fa fa-sliders"></i>OPERAÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anuncios as $anuncio)
                                        <tr>
                                            <td>{{ $anuncio->tipo_evento->nome }}</td>
                                            <td>{{ $anuncio->destinatario->nome }}</td>
                                            <td>{{ $anuncio->assunto }}</td>
                                            <td>{{ $anuncio->descricao }}</td>
                                            <td>{{ $anuncio->data }}</td>
                                            <td class="action-link">
                                                <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                    data-target="#editDetailModal{{ $anuncio->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                    data-target="#deleteDetailModal{{ $anuncio->id }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <!-- Delete Modal -->
                                        <div id="deleteDetailModal{{ $anuncio->id }}" class="modal fade"
                                            role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i>DELETE CLASS
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Deseja realmente excluir este anuncio?</label>
                                                        <div class="table-action-box">
                                                            <a href="{{ route('apagar_anuncio', ['id' => $anuncio->id]) }}"
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
                                        <div id="editDetailModal{{ $anuncio->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-edit"></i>EDITAR ANÚNCIO
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body dash-form">
                                                        <form
                                                            action="{{ route('actualizar_anuncio', ['id' => $anuncio->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-cogs"></i>TIPO</label>
                                                                <select required value="{{ 'tipo_evento_id' }}"
                                                                    name="tipo_evento_id">
                                                                    <option value="{{ $tipo->id }}">
                                                                        {{ $anuncio->tipo_evento->nome }}</option>
                                                                    @foreach ($tipos_eventos as $tipo)
                                                                        <option value="{{ $tipo->id }}">
                                                                            {{ $tipo->nome }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-code"></i>DESTINATÁRIO</label>
                                                                <select required value="{{ 'destinatario_id' }}"
                                                                    name="destinatario_id">
                                                                    <option value="{{ $anuncio->destinatario->id }}">
                                                                        {{ $anuncio->destinatario->nome }}</option>
                                                                    @foreach ($destinatarios as $dest)
                                                                        <option value="{{ $dest->id }}">
                                                                            {{ $dest->nome }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-user-secret"></i>EXPIRA EM</label>
                                                                <input type="date" required name="dataexp"
                                                                    value="{{ $anuncio->data }}" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-code"></i>ASSUNTO</label>
                                                                <input type="text" required name="assunto"
                                                                    placeholder="Assunto"
                                                                    value="{{ $anuncio->assunto }}" />
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-sm-12">
                                                                <label><i class="fa fa-info-circle"></i>DESCRIÇÃO</label>
                                                                <textarea required value="{{ 'descricao' }}" name="descricao">{{ $anuncio->descricao }}</textarea>
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
