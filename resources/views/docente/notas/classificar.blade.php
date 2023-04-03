@extends('layouts.principal_admin')
@section('conteudo')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-address-card"></i>ATRIBUIR NOTAS</h5>
            <div class="section-divider"></div>
        </div>
    </div>

    @if(session('notas'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> {{ session('notas') }}. 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <form action="/pesquisar_atribuir_notas" method="POST">
                    @csrf
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-search"></i>FAÇA SELEÇÃO</h6>
                    <div class="inner-item dash-search-form">
                        <div class="col-md-3 col-sm-6">
                            <label for="validationDefault01">CURSO</label>
                            <select name="curso_id" id="curso_id validationDefault01" onchange="turmas_disciplinas(this)" required>
                             <option value="">--Selecione--</option>
                             @foreach ($cursos as $curso)
                                 <option value="{{ $curso->id }}"> {{$curso->nome}}</option>
                             @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="validationDefault01">TURMA</label>
                            <select name="turma_id" id="turma_id" required>
                                <option required>--Selecione--</option>

                             
                            </select>
                        </div>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-md-3 col-sm-6">
                            <label for="validationDefault01">DISCIPLINA</label>
                            <select name="disciplina_id" id="disciplina_id" required>
                                <option required>--Selecione--</option>
                             
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="validationDefault01">TIPO DE AVALIAÇÃO</label>
                            <select name="tipo_avaliacao_id" required>
                                <option required>--Selecione--</option>
                            
                                @foreach ($tipos_avaliacoes as $tipo_avaliacao)
                                    <option value="{{ $tipo_avaliacao->id }}">{{ $tipo_avaliacao->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-3">
                            <button type="submit" class="submit-btn"><i class="fa fa-search"></i>SELECIONE</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                </form>
            </div>

         

            <div class="col-lg-12">
                @if (session('turma'))
                <form action="/salvar_notas" method="POST">
                    @csrf
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-info-circle"></i>ATRIBUIR NOTAS - {{ session('disciplina')->nome }} Turma {{ session('turma')->turma }}</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                             
                                    <th><i class="fa fa-user"></i>NOME</th>
                                    <th><i class="fa fa-book"></i>CURSO</th>
                                    <th><i class="fa fa-code"></i>DISCIPLINA</th>
                                    <th><i class="fa fa-cogs"></i>TIPO AVALIAÇÃO</th>
                                    <th><i class="fa fa-address-card"></i>CLASSIFICAÇÃO</th>
                                    <th><i class="fa fa-address-card"></i>CLASSIFICAÇÃO MÁXIMA</th>
                                    <th><i class="fa fa-edit"></i>OBSERVAÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (session('turma')->estudantes as $estudante)
                                <tr>
                                    <td>{{ $estudante->estudante->name }}</td>
                                    <td>{{ $estudante->curso->nome }}</td>
                                    <td>{{ session('disciplina')->nome }}</td>
                                    <td>
                                        {{ session('tipo_avaliacao')->nome }}
                                    </td>
                                    @foreach (session('notas') as $nota)
                                    @if($nota->estudante_id ==$estudante->id && $nota->tipo_avaliacao_id==session('tipo_avaliacao')->id)
                                    <td><input type="text" placeholder="" name="nota[]" value="{{ $nota->nota }}" class="datatable-input"/></td>
                                    @endif
                                    @endforeach
                                    <td><input type="text" placeholder="" value="20" name="nota_max[]" class="datatable-input"/></td>
                                    <td><input type="text" placeholder="" name="observacao[]" class="datatable-input"/></td>
                                    <input type="hidden" name="estudante_id[]" id="estudante" value="{{ $estudante->id }}">
                                    <input type="hidden" name="nivel_id[]" id="nivel" value="{{ $estudante->nivel_id }}">
                                </tr>
                                @endforeach
                           
                            </tbody>
                        </table>

                        <input type="hidden" name="turma_id" value="{{ session('turma')->id }}">
                        <input type="hidden" name="disciplina_id" value="{{ session('disciplina')->id }}">
                        <input type="hidden" name="curso_id" value="{{ session('turma')->curso_id }}">
                        <input type="hidden" name="tipo_avaliacao_id" value="{{ session('tipo_avaliacao')->id }}">
                        <div class="table-action-box">
                            <button type="submit" class="submit-btn btn btn-success"><i class="fa fa-check"></i>SALVAR</button>
                            <a href="" class="cancel"><i class="fa fa-ban"></i>CANCELAR</a>
                        </div>
                    </div>
                </div>
            </form>
                @else
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-info-circle"></i>NENHUM ITEM SELECIONADO</h6>
            </div>
            </div>
            @endif
           
        </div>
    </div>
</div>
@endsection