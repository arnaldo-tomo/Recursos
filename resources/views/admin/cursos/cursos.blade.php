@extends('layouts.principal_admin')
@section('conteudo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-sliders"></i>CURSOS</h5>
                <div class="section-divider"></div>
            </div>
        </div>


        @if (session('curso'))
            <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> curso
                criado com sucesso.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif


        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="col-sm-3">
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-plus-circle"></i>NOVO CURSO</h6>
                        <div class="inner-item">
                            <form action="/salvar_curso" method="POST">
                                @csrf
                                <div class="dash-form">
                                    <label class="clear-top-margin"><i class="fa fa-book"></i>CURSO</label>
                                    <input type="text" name="nome" onchange="atribuir_codigo(this);" placeholder="" />
                                    <label><i class="fa fa-code"></i>CODIGO</label>
                                    <input type="text" name="codigo" id="codigo_curso" placeholder="" />
                                    <script>
                                        function atribuir_codigo(valor) {
                                            var string = valor.value;
                                            var names = string.split(' ');
                                            var initials = "";
                                            for (var i = 0; i < names.length; i++) {
                                                initials += names[i].substring(0, 1).toUpperCase();
                                            }

                                            // if (names.length > 1) {
                                            // initials += names[names.length - 1].substring(0, 1).toUpperCase();
                                            // }
                                            document.getElementById('codigo_curso').value = initials;


                                        }
                                    </script>

                                    <label><i class="fa fa-user-secret"></i>CORDENADOR</label>
                                    <select name="docente_id">
                                        <option>-- Selecione --</option>
                                        @foreach ($docentes as $docente)
                                            <option value="{{ $docente->id }}">{{ $docente->docente->name }}
                                                {{ $docente->docente->apelido }}</option>
                                        @endforeach
                                    </select>
                                    <label><i class="fa fa-user-secret"></i>ANO LECTIVO</label>
                                    <select name="ano_id">
                                        <option>-- Selecione --</option>
                                        @foreach ($anos as $ano)
                                            <option value="{{ $ano->id }}"> {{ $ano->Ano }} </option>
                                        @endforeach
                                    </select>
                                    <label><i class="fa fa-user-secret"></i>PROPINA</label>
                                    <select name="propina_id">
                                        <option>-- Selecione --</option>
                                        @foreach ($propinas as $propina)
                                            <option value="{{ $propina->id }}"> {{ $propina->Valor }} </option>
                                        @endforeach
                                    </select>
                                    <label><i class="fa fa-info-circle"></i>DESCRIÇÃO</label>
                                    <textarea name="descricao" placeholder="Escreva a descrição"></textarea>
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
                                class="text-capitalize">Parabens!</strong> curso actualizado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    @if (session('Apagar'))
                        <div class="alert alert-card alert-danger" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> curso eliminado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-sliders"></i>TODOS CURSOS</h6>
                        <div class="inner-item">
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-book"></i>CURSO</th>
                                        <th><i class="fa fa-code"></i>CODIGO</th>
                                        <th><i class="fa fa-user-secret"></i>COORDENADOR/REPRESENTANTE</th>
                                        <th><i class="fa fa-info-circle"></i>DESCRIÇÃO</th>
                                        <th><i class="fa fa-sliders"></i>OPERAÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($cursos as $curso)
                                        <tr>
                                            <td>{{ $curso->nome }}</td>
                                            <td>{{ $curso->codigo }}</td>
                                            <td>{{ $curso->docente->docente->name }}
                                                {{ $curso->docente->docente->apelido }}</td>
                                            <td>{{ $curso->descricao }}</td>
                                            <td class="action-link">
                                                <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                    data-target="#editDetailModal{{ $curso->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                    data-target="#deleteDetailModal{{ $curso->id }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Delete Modal -->
                                        <div id="deleteDetailModal{{ $curso->id }}" class="modal fade" role="dialog">
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
                                                        <label>Deseja realmente excluir {{ $curso->nome }}?</label>
                                                        <div class="table-action-box">
                                                            <a href="{{ route('apagar_curso', ['id' => $curso->id]) }}"
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
                                        <div id="editDetailModal{{ $curso->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-edit"></i>Editar curso
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body dash-form">
                                                        <form
                                                            action="{{ route('actualizar_curso', ['id' => $curso->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="col-sm-4">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-book"></i>Nome do curso</label>
                                                                <input type="text" name="nome"
                                                                    value="{{ $curso->nome }}" />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-code"></i>Codigo</label>
                                                                <input type="text" name="codigo"
                                                                    value="{{ $curso->codigo }}" />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-user-secret"></i>COORDENADOR/REPRESENTANTE</label>
                                                                <select name="docente_id">
                                                                    <option value="{{ $docente->id }}">
                                                                        {{ $curso->docente->docente->name }}
                                                                        {{ $curso->docente->docente->apelido }}</option>
                                                                    @foreach ($docentes as $docente)
                                                                        <option value="{{ $docente->id }}">
                                                                            {{ $docente->docente->name }}
                                                                            {{ $docente->docente->apelido }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-sm-4">
                                                                <label><i class="fa fa-user-secret"></i>ANO LECTIVO</label>
                                                                <select name="ano_id">
                                                                    <option value="{{ $ano->id }}">
                                                                        {{ $ano->Ano }}</option>
                                                                    @foreach ($anos as $ano)
                                                                        <option value="{{ $ano->id }}">
                                                                            {{ $ano->Ano }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label><i class="fa fa-user-secret"></i>PROPINA</label>
                                                                <select name="propina_id">
                                                                    <option value="{{ $propina->id }}">
                                                                        {{ $propina->Valor }} </option>
                                                                    @foreach ($propinas as $propina)
                                                                        <option value="{{ $propina->id }}">
                                                                            {{ $propina->Valor }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-sm-12">
                                                                <label><i class="fa fa-info-circle"></i>DESCRIÇÃO</label>
                                                                <textarea name="descricao">{{ $curso->descricao }}</textarea>
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
