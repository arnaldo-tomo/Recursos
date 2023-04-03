@extends('layouts.principal_admin')
@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-bar-money"></i>Propinas</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-search"></i>VIEW FEE STATUS</h6>
                    <div class="inner-item dash-search-form">
                    <form action="/pesquisar_pagamento" method="POST">
                    @csrf
                        <div class="col-sm-4">
                            <label>CURSO</label>
                          
                        </div>
                        <div class="col-sm-4">
                            <label>TURMA</label>
                         
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="submit-btn"><i class="fa fa-search"></i>Procurar</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-lg-12">
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-info-circle"></i>Detalhes de pagamentos</h6>
                    <div class="inner-item">
                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" cellpadding="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-user"></i>Estudante</th>
                                    <th><i class="fa fa-book"></i>Curso</th>
                                    <th><i class="fa fa-book"></i>Turma</th>
                                    @foreach ($meses as $mes)
                                    <th><i class="fa fa-calendar"></i>{{substr($mes->Mes,0,3)}}</th>
                                    @endforeach
                                    <th><i class="fa fa-money"></i>Total pago</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($estudantes as $estudante)
                                   
                                <tr>
                                    <td>{{$estudante->estudante->name}} {{$estudante->estudante->apelido}}</td>
                                    <td>{{$estudante->curso->codigo}}</td>
                                    <td>{{$estudante->turma->turma}}</td>
                                    @foreach ($pagamentos as $pagamento)
                                    @if($estudante->id==$pagamento->Estudante_id)
                                    @if($pagamento->Estado==0)
                                         <td class="text-danger"> 
                                        N/A 
                                        </td> 
                                        @else 
                                        <td class="text-success"> 
                                        Pago 
                                        </td>
                                       
                                        @endif
                                    @endif
                                    @endforeach
                                    <td>{{$pagamento->estudante->curso->propina->Valor}} </td>
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