@extends('layouts.principal_admin')
@section('conteudo')



    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-users"></i>HORÁRIOS POR CURSOS</h5>
                <div class="section-divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="col-lg-12">
                    <div class="dash-item first-dash-item">
                        <h6 class="item-title"><i class="fa fa-search"></i>EFETUAR SELEÇÃO {{ session('key') }}</h6>
                        <form action="/pesquisar_horario" method="POST">
                            @csrf
                            <div class="inner-item dash-search-form">
                                <div class="col-sm-4">
                                    <label>CURSO</label>
                                    <select id="curso_id" name="curso_id" onchange="turmas_disciplinas(this);">
                                        @foreach ($cursos as $curso)
                                            <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>TURMA</label>
                                    <select id="turma_id" name="turma_id">
                                        <option>---Selecione a turma---</option>

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="submit-btn"><i class="fa fa-search"></i>PESQUISAR</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>








                <div class="col-lg-12">
                    <div class="dash-item">
                        @if (session('resultado_pesquisa') && sizeof(session('resultado_pesquisa')->turnos) > 0)
                            <h6 class="item-title"><i
                                    class="fa fa-edit"></i>{{ session('resultado_pesquisa')->curso->nome }} -
                                {{ session('resultado_pesquisa')->turma }}</h6>
                            @foreach (session('resultado_pesquisa')->turnos as $turno)
                                <div class="inner-item">
                                    {{ $turno->periodo->nome }} - {{ $turno->descricao }}
                                    <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-clock-o"></i>TEMPO</th>
                                                <th><i class="fa fa-calendar"></i>SEGUNDA-FEIRA</th>
                                                <th><i class="fa fa-calendar"></i>TERÇA-FEIRA</th>
                                                <th><i class="fa fa-calendar"></i>QUARTA-FEIRA</th>
                                                <th><i class="fa fa-calendar"></i>QUINTA-FEIRA</th>
                                                <th><i class="fa fa-calendar"></i>SEXTA-FEIRA</th>
                                                <th><i class="fa fa-calendar"></i>SÁBADO</th>
                                                {{-- <th><i class="fa fa-tasks"></i>OPERAÇÃO</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($turno->tempos as $tempo)
                                                <tr>
                                                    <td>{{ $tempo->tempo }}º {{ $tempo->inicio }}-{{ $tempo->fim }}</td>
                                                    @foreach ($dias as $dia)
                                                        <?php $contador = 0; ?>{{--  contador para determinar se num dia e uma determinada hora tem  o respetivo horario --}}
                                                        @foreach (session('resultado_pesquisa')->horarios->sortBy('dia_id') as $horario)
                                                            @if ($horario->tempo_id == $tempo->id)
                                                                @if ($horario->dia_id == $dia->id)
                                                                    <?php $contador++; ?>
                                                                    <td>
                                                                        <span>Disciplina:
                                                                            {{ $horario->disciplina->nome }}</span>
                                                                        <span>Sala: {{ $horario->sala }}</span>
                                                                        <span>Docente:
                                                                            {{ $horario->docente->docente->name }}</span>
                                                                    </td>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        @if ($contador == 0)
                                                            <td></td>{{--  se nao tiver nenhum espaço em branco --}}
                                                        @elseif ($contador > 1)
                                                            <td></td>{{--   se tiver mais de um espaço em branco --}}
                                                        @endif
                                                    @endforeach

                                                    {{-- <td class="action-link">
                                            <a class="edit" href="#" title="Edit" data-toggle="modal" data-target="#editDetailModal"><i class="fa fa-edit"></i></a>
                                            <a class="delete" href="#" title="Delete" data-toggle="modal" data-target="#deleteDetailModal"><i class="fa fa-trash"></i></a>
                                         </td> --}}
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{-- <div class="table-action-box">
                            <a href="#" class="save"><i class="fa fa-check"></i>SALVAR</a>
                            <a href="#" class="cancel"><i class="fa fa-ban"></i>CANCEL</a>
                        </div> --}}
                                </div>
                            @endforeach
                        @else
                            <h6 class="item-title"><i class="fa fa-search"></i>Nenhum resultado encontrado</h6>
                        @endif

                    </div>
                </div>





            </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div id="deleteDetailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-trash"></i>DELETE SLOT</h4>
                </div>
                <div class="modal-body">
                    <div class="table-action-box">
                        <a href="#" class="save"><i class="fa fa-check"></i>YES</a>
                        <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


    <!--Edit details modal-->
    <div id="editDetailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i>EDIT SLOT DETAILS</h4>
                </div>
                <div class="modal-body dash-form">
                    <div class="col-sm-3">
                        <label class="clear-top-margin"><i class="fa fa-clock-o"></i>SLOT</label>
                        <select>
                            <option>09 - 10 AM </option>
                            <option>09 - 10 AM </option>
                            <option>10 - 11 AM </option>
                            <option>11 - 12 PM </option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="clear-top-margin"><i class="fa fa-calendar"></i>MONDAY</label>
                        <select>
                            <option>MTH101 </option>
                            <option>PHY101</option>
                            <option>BIO101</option>
                            <option>CHE101</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="clear-top-margin"><i class="fa fa-calendar"></i>TUESDAY</label>
                        <select>
                            <option>MTH101 </option>
                            <option>PHY101</option>
                            <option>BIO101</option>
                            <option>CHE101</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="clear-top-margin"><i class="fa fa-calendar"></i>WEDNESDAY</label>
                        <select>
                            <option>MTH101 </option>
                            <option>PHY101</option>
                            <option>BIO101</option>
                            <option>CHE101</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-3">
                        <label><i class="fa fa-calendar"></i>THURSDAY</label>
                        <select>
                            <option>MTH101 </option>
                            <option>PHY101</option>
                            <option>BIO101</option>
                            <option>CHE101</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label><i class="fa fa-calendar"></i>FRIDAY</label>
                        <select>
                            <option>MTH101 </option>
                            <option>PHY101</option>
                            <option>BIO101</option>
                            <option>CHE101</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label><i class="fa fa-calendar"></i>SATURDAY</label>
                        <select>
                            <option>MTH101 </option>
                            <option>PHY101</option>
                            <option>BIO101</option>
                            <option>CHE101</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <div class="table-action-box">
                        <a href="#" class="save"><i class="fa fa-check"></i>SAVE</a>
                        <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
