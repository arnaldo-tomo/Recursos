@extends('layouts.principal_admin')
@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-code"></i>UPLOAD DA RESPOLUÇÃO</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-download"></i>UPLOAD</h6>
                    <div class="inner-item dash-search-form">
                        <form action="/pesquisar_avaliacoes_estudante" method="POST">
                            @csrf
                        <div class="col-sm-4">
                            <label>Disciplina</label>
                            <select name="disciplina_id" id="disciplina_id">

                                <option>--Disciplina--</option>
                             @foreach ($disciplinas as $disciplina)
                                 <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                             @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Tipo de avaliação</label>
                            <select name="tipo_avaliacao_id">
                                <option>--Tipos de avaliação--</option>
                                
                                @foreach ($tipos_avaliacoes as $tipo_avaliacao)
                                    <option value="{{ $tipo_avaliacao->id }}">{{ $tipo_avaliacao->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="submit-btn"><i class="fa fa-search"></i>PESQUISAR</button>
                        </div>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">

                
                @if (session('avaliacoes'))

                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-book"></i>{{ session('disciplina')->nome }}</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-book"></i>DISCIPLINA</th>
                                    <th><i class="fa fa-info-circle"></i>TIPO DE AVALIAÇÃO</th>
                                    <th><i class="fa fa-file-o"></i>NOME DOCENTE</th>
                                    <th><i class="fa fa-calendar"></i>PRAZO ENTREGA</th>
                                    <th><i class="fa fa-pencil-square-o"></i>OBSERVAÇÕES</th>
                                    <th><i class="fa fa-link"></i>LINK</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach (session('avaliacoes') as $avaliacao)
                                <tr>
                                    <td>{{ $avaliacao->disciplina->nome }}</td>
                                    <td>{{ $avaliacao->tipo_avaliacao->nome }}</td>
                                    <td>{{ $avaliacao->docente->docente->name }}</td>
                                    <td>{{ $avaliacao->data }}</td>
                                    <td>{{ $avaliacao->observacao }}</td>
                                    <td><a href=""><i class="fa fa-download"></i>UPLOAD</a></td>
                                </tr> 
                                @endforeach
                             
                            </tbody>
                        </table>
                    </div>
                </div> 


                    
                @else
              
                

                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-book"></i>TODAS AVALIAÇÕES</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-book"></i>DISCIPLINA</th>
                                    <th><i class="fa fa-info-circle"></i>TIPO DE AVALIAÇÃO</th>
                                    <th><i class="fa fa-file-o"></i>NOME DOCENTE</th>
                                    <th><i class="fa fa-calendar"></i>PRAZO ENTREGA</th>
                                    <th><i class="fa fa-pencil-square-o"></i>OBSERVAÇÕES</th>
                                    <th><i class="fa fa-link"></i>LINK</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach ($avaliacoes as $avaliacao)
                                <tr>
                                    <td>{{ $avaliacao->disciplina->nome }}</td>
                                    <td>{{ $avaliacao->tipo_avaliacao->nome }}</td>
                                    <td>{{ $avaliacao->docente->docente->name }}</td>
                                    <td>{{ $avaliacao->data }}</td>
                                    <td>{{ $avaliacao->observacao }}</td>
                                    <td><a href="{{ $avaliacao->ficheiro }}"><i class="fa fa-download"></i>DOWNLOAD</a></td>
                                </tr> 
                                @endforeach
                             
                            </tbody>
                        </table>
                    </div>
                </div> 
                @endif

            </div>
        </div>
    </div>
</div>

@endsection