@extends('layouts.principal_admin')
@section('conteudo')


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-clock-o"></i>HORÁRIOS</h5>
                <div class="section-divider"></div>
            </div>
        </div>
        @if (session('mensagem'))
            <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong>
                {{ session('mensagem') }}.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif
        @if (session('mensagem_erro'))
            <div class="alert alert-card alert-danger" role="alert"><strong class="text-capitalize">Erro!</strong>
                {{ session('mensagem_erro') }}.
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
                <div class="col-sm-12">
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-plus-circle"></i>Adicionar horário</h6>
                        <div class="inner-item">
                            <form action="/salvar_horario" method="POST">
                                @csrf
                                <div class="dash-form">
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-calendar"></i>DIA</label>
                                        <select required value="{{ old('dia_id') }}" name="dia_id">
                                            <option>-- Selecione --</option>
                                            @foreach ($dias as $dia)
                                                <option value="{{ $dia->id }}">{{ $dia->dia }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-clock-o"></i>REGIME</label>
                                        <select required value="{{ old('regime_id') }}" name="regime_id" id="regime_id"
                                            onchange="mostrar_periodos(this)">
                                            <option value="">---Selecione---</option>
                                            @foreach ($regimes as $regime)
                                                <option value="{{ $regime->id }}">{{ $regime->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-clock-o"></i>PERÍODO</label>
                                        <select required value="{{ old('periodo_id') }}" name="periodo_id" id="periodo_id"
                                            onchange="mostrar_turnos(this)">
                                            <option value="">---Selecione---</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-clock-o"></i>TURNO</label>
                                        <select required value="{{ old('turno_id') }}" name="turno_id" id="turno_id"
                                            onchange="mostrar_tempos(this)">
                                            <option value="">---Selecione---</option>

                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <label><i class="fa fa-clock-o"></i>TEMPO</label>
                                        <select required value="{{ old('tempo_id') }}" name="tempo_id" id="tempo_id">
                                            <option value="">---Selecione---</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-book"></i>CURSO</label>
                                        <select required value="{{ old('curso_id') }}" name="curso_id"
                                            onchange="turmas_disciplinas(this);">
                                            <option>-- Selecione --</option>
                                            @foreach ($cursos as $curso)
                                                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-users"></i>TURMA</label>
                                        <select required value="{{ old('turma_id') }}" name="turma_id" id="turma_id">
                                            <option>-- Selecione --</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-code"></i>DISCIPLINA</label>
                                        <select required value="{{ old('disciplina_id') }}" name="disciplina_id"
                                            id="disciplina_id">
                                            <option>-- Selecione --</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><i class="fa fa-user"></i>DOCENTE</label>
                                        <select required value="{{ old('docente_id') }}" name="docente_id">
                                            <option>-- Selecione--</option>
                                            @foreach ($docentes as $docente)
                                                <option value="{{ $docente->id }}">
                                                    {{ $docente->codigo }}-{{ $docente->docente->name }}
                                                    {{ $docente->docente->apelido }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><i class="fa fa-home"></i>SALA</label>
                                        <input required value="{{ old('sala') }}" type="text" name="sala">
                                    </div>
                                    <div class="col-sm-4">
                                        <label><i class="fa fa-time"></i>ANO</label>

                                        <?php $anos = range(2005, strftime('%Y', time())); ?>
                                        <select required value="{{ old('ano') }}" name="ano">
                                            <option>-- Selecione--</option>
                                            <?php foreach($anos as $ano) : ?>
                                            <option value="<?php echo $ano; ?>"><?php echo $ano; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="col-sm-12">

                                        <button type="submit" class="btn btn-success"> CRIAR</button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-sm-12">
                    @if (session('actualizar'))
                        <div class="alert alert-card alert-success" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> horario actualizado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    @if (session('Apagar'))
                        <div class="alert alert-card alert-danger" role="alert"><strong
                                class="text-capitalize">Parabens!</strong> horario eliminado com sucesso. </a>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="dash-item">
                        <h6 class="item-title"><i class="fa fa-sliders"></i>LISTAGEM HORÁRIOS</h6>
                        <div class="inner-item">
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-calendar"></i>DIA</th>
                                        <th><i class="fa fa-clock-o"></i>HORAS</th>
                                        <th><i class="fa fa-book"></i>CURSO</th>
                                        <th><i class="fa fa-cogs"></i>TURMA</th>
                                        <th><i class="fa fa-code"></i>DISCIPLINA</th>
                                        <th><i class="fa fa-user"></i>DOCENTE</th>
                                        <th><i class="fa fa-home"></i>SALA</th>
                                        <th><i class="fa fa-sliders"></i>OPERAÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($horarios as $horario)
                                        <tr>
                                            <td>{{ $horario->dia->dia }}</td>
                                            <td>{{ $horario->tempo->inicio }}-{{ $horario->tempo->fim }}</td>
                                            <td>{{ $horario->curso->nome }}</td>
                                            <td>{{ $horario->turma->turma }}</td>
                                            <td>{{ $horario->disciplina->nome }}</td>
                                            <td>{{ $horario->docente->docente->name }}
                                                {{ $horario->docente->docente->apelido }}</td>
                                            <td>{{ $horario->sala }}</td>
                                            <td class="action-link">
                                                <a class="edit" href="#" title="Edit" data-toggle="modal"
                                                    data-target="#editDetailModal{{ $horario->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="delete" href="#" title="Delete" data-toggle="modal"
                                                    data-target="#deleteDetailModal{{ $horario->id }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>




                                        <!-- Delete Modal -->
                                        <div id="deleteDetailModal{{ $horario->id }}" class="modal fade"
                                            role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i>Apagar horario
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Deseja realmente excluir?</label>
                                                        <div class="table-action-box">
                                                            <a href="{{ route('apagar_horario', ['id' => $horario->id]) }}"
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
                                        <div id="editDetailModal{{ $horario->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-edit"></i>Editar horario
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body dash-form">
                                                        <form
                                                            action="{{ route('actualizar_horario', ['id' => $horario->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-user-secret"></i>DIA</label>
                                                                <select name="dia_id">
                                                                    <option value="{{ $horario->dia->id }}">
                                                                        {{ $horario->dia->dia }}</option>
                                                                    @foreach ($dias as $dia)
                                                                        <option value="{{ $dia->id }}">
                                                                            {{ $dia->dia }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            {{-- <div class="col-sm-3">
                <label class="clear-top-margin"><i class="fa fa-clock-o"></i>PERÍIODO</label>
                              <select name="periodo_id" id="periodo_id">
                                  <option value="{{$periodo->id}}">{{$horario->periodo->nome}}</option>
                                  @foreach ($periodos as $periodo)
                                      <option value="{{$periodo->id}}">{{$periodo->nome}}</option>
                                  @endforeach
                              </select>
                </div> --}}
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-clock-o"></i>TEMPO</label>
                                                                <select name="hora_id" id="hora_id">
                                                                    <option value="{{ $horario->id }}">
                                                                        {{ $horario->tempo->tempo }}º
                                                                        {{ $horario->tempo->inicio }}-{{ $horario->tempo->fim }}
                                                                    </option>
                                                                    @foreach ($tempos as $tempo)
                                                                        <option value="{{ $tempo->id }}">
                                                                            {{ $tempo->tempo }}º
                                                                            {{ $tempo->inicio }}-{{ $tempo->fim }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i
                                                                        class="fa fa-book"></i>CURSO</label>
                                                                <select name="curso_id"
                                                                    onchange="turmas_disciplinas(this);">
                                                                    <option value="{{ $curso->id }}">
                                                                        {{ $horario->curso->nome }}</option>
                                                                    @foreach ($cursos as $curso)
                                                                        <option value="{{ $curso->id }}">
                                                                            {{ $curso->nome }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-sm-2">
                                                                <label><i class="fa fa-users"></i>TURMA</label>
                                                                <select name="turma_id" id="turma_id">
                                                                    <option>-- Selecione --</option>

                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-code"></i>DISCIPLINA</label>
                                                                <select name="disciplina_id" id="disciplina_id">
                                                                    <option>-- Selecione --</option>

                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-user"></i>DOCENTE</label>
                                                                <select name="docente_id">
                                                                    <option value="{{ $docente->id }}">
                                                                        {{ $horario->docente->docente->name }}
                                                                        {{ $horario->docente->docente->apelido }}</option>
                                                                    @foreach ($docentes as $docente)
                                                                        <option value="{{ $docente->id }}">
                                                                            {{ $docente->codigo }}-{{ $docente->docente->name }}
                                                                            {{ $docente->docente->apelido }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label><i class="fa fa-home"></i>SALA</label>
                                                                <input type="text" name="sala"
                                                                    value="{{ $horario->sala }}">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label><i class="fa fa-time"></i>ANO</label>
                                                                <input type="text" name="ano"
                                                                    value="{{ $horario->ano }}">
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

    <script>
        function turmas_disciplinas(curso) {

            var curso_id = curso.value;


            $.get('/json-turmas?curso_id=' + curso_id, function(data) {

                console.log(data);

                $('#turma_id').empty();
                $('#turma_id').append(
                    '<option value="" disable="true" selected="true" >--- Selecione ---</option>');

                $.each(data, function(index, turma) {
                    $('#turma_id').append('<option value="' + turma.id + '">' + turma.turma + '</option>');
                })

            });



            $.get('/json-disciplinas?curso_id=' + curso_id, function(data) {

                console.log(data);

                $('#disciplina_id').empty();
                $('#disciplina_id').append(
                    '<option value="" disable="true" selected="true" >--- Selecione ---</option>');

                $.each(data, function(index, disciplina) {
                    $('#disciplina_id').append('<option value="' + disciplina.id + '">' + disciplina.nome +
                        '</option>');
                })

            });
        }


        function mostrar_periodos(regime) {
            var regime_id = regime.value;

            $.get('/json-periodos?regime_id=' + regime_id, function(data) {
                console.log(data);

                $('#periodo_id').empty();

                $('#periodo_id').append('<option value="">--Selecione--</option>');

                $.each(data, function(index, periodo) {
                    $('#periodo_id').append('<option value="' + periodo.id + '">' + periodo.nome +
                        '</option>');
                })
            });

        }

        function mostrar_turnos(periodo) {
            var periodo_id = periodo.value;

            $.get('/json-turnos?periodo_id=' + periodo_id, function(data) {
                console.log(data);

                $('#turno_id').empty();

                $('#turno_id').append('<option value="">--Selecione--</option>');

                $.each(data, function(index, turno) {
                    $('#turno_id').append('<option value="' + turno.id + '">' + turno.descricao +
                        '</option>');
                })
            });

        }

        function mostrar_tempos(turno) {
            var turno_id = turno.value;

            $.get('/json-tempos?turno_id=' + turno_id, function(data) {
                console.log(data);

                $('#tempo_id').empty();

                $('#tempo_id').append('<option value="">--Selecione--</option>');

                $.each(data, function(index, tempo) {
                    $('#tempo_id').append('<option value="' + tempo.id + '">' + tempo.tempo + 'º ' + tempo
                        .inicio + ' - ' + tempo.fim + '</option>');
                })
            });

        }
    </script>





@endsection
