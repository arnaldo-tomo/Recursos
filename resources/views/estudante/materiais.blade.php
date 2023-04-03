@extends('layouts.principal_admin')
@section('conteudo')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-code"></i>MATERIAIS</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            
            <div class="col-lg-12">


                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-book"></i>MATERIAIS ACADÉMICOS</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-book"></i>NOME</th>
                                    <th><i class="fa fa-info-circle">DISCIPLINA</i></th>
                                    <th><i class="fa fa-user"></i>DOCENTE</th>
                                    <th><i class="fa fa-calendar"></i>SUBMETIDO EM</th>
                                    <th><i class="fa fa-pencil-square-o"></i>OBSERVAÇÕES</th>
                                    <th><i class="fa fa-link"></i>LINK</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach ($materiais as $material)
                                <tr>
                                    <td>{{ $material->nome }}</td>
                                    <td>{{ $material->disciplina->nome }}</td>
                              
                                    <td>{{ $material->docente->docente->name }}</td>
                                    <td>{{ $material->data }}</td>
                                    <td>{{ $material->observacao }}</td>
                                    <td><a href="{{ $material->ficheiro }}"><i class="fa fa-download"></i>DOWNLOAD</a></td>
                                </tr> 
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


