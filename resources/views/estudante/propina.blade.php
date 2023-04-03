@extends('layouts.principal_admin')
@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-bar-money"></i>FEES</h5>
            <div class="section-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-lg-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-search"></i>VIEW FEE STATUS</h6>
                    <form action="{{route('filtrar_pagamentos')}}" method="POST">
                        @csrf
                        <div class="inner-item dash-search-form">
                            {{---<div class="col-sm-4">
                                <label>Ano Lectivo</label>
                                <select name="Ano">
                                    <option>All</option>
                                    @foreach ($anos as $ano)
                                    <option value="{{$ano->Ano}}"> {{$ano->Ano}} </option>
                                    @endforeach
                                </select>
                            </div>--}}
                            <div class="col-sm-4">
                                <label>Tipo de pagamentos</label>
                                <select name="id">
                                    <option>All</option>
                                    @foreach ($tipo_pagamentos as $pagamento)
                                    <option value="{{$pagamento->id}}">{{$pagamento->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="submit-btn"><i class="fa fa-search"></i>SEARCH</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-info-circle"></i>FEE DETAILS</h6>
                    <div class="inner-item">

                        {{--Inicio da tabela que vai ser printada depois de se clicar no metodo de--}}
                        @if (session('propinas'))

                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <tr>
                                    <th><i class="fa fa-money"></i>Mes</th>
                                    <!---<th><i class="fa fa-calendar"></i>Tipo de pagamento</th>--->
                                    <th>Estado de Pagamento</th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('propinas') as $propina)
                                <tr>
                                    <td>{{$propina->mes->Mes}}</td>
                                    <!---<td>{{ session('tipo_pagamentos')->nome}}</td>-->
                                    @if ($propina->Estado == 0)
                                    <td class="text-danger">
                                        Não Pago
                                    </td>
                                    @else
                                    <td class="text-success">
                                        Pago
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @else

                        <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-money"></i>Valor</th>
                                    <th><i class="fa fa-calendar"></i>Data limite</th>
                                    <th><i class="fa fa-calendar"></i>Data de pagamento</th>
                                    <th><i class="fa fa-calendar"></i>Referente a</th>
                                    <th><i class="fa fa-cogs"></i>Metodo de pagamento</th>
                                    <th><i class="fa fa-check"></i>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($propinas as $propina)
                                <tr>
                                    <td>{{ $propina->propina->Valor }}</td>
                                    <td>{{ date('Y-m-d', strtotime($propina->propina->Data_inicio . '+' . $propina->Mes_id . '+' . $propina->propina->dias . ' days')) }}
                                    </td>
                                    @if ($propina->Data_pagamento == null)
                                    <td>--</td>
                                    @else
                                    <td>
                                        {{ $propina->Data_pagamento }}
                                    </td>
                                    @endif
                                    <td>{{ $propina->mes->Mes }}</td>
                                    @if (isset($propina->tpagamento))
                                    <td>{{ $propina->tpagamento->nome }}</td>
                                    @else
                                    <td>--</td>
                                    @endif
                                    @if ($propina->Estado == 0)
                                    <td class="text-danger">
                                        Não Pago
                                    </td>
                                    @else
                                    <td class="text-success">
                                        Pago
                                    </td>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection