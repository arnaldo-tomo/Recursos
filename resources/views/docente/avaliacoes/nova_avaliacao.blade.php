@extends('layouts.principal_admin')
@section('conteudo')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-code"></i>CRIAR AVALIAÇÃO</h5>
            <div class="section-divider"></div>
        </div>
    </div>

    @if(session('avaliacao'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> {{ session('avaliacao') }}. 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-xs-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-edit"></i>NOVA AVALIAÇÃO</h6>
                    <form id="validar" class="row g-3" action="/salvar_nova_avaliacao" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="inner-item">
                        <div class="dash-form ">
                            <div class="col-sm-3 has-danger">
                                <label class="clear-top-margin" for="validationDefault01"><i class="fa fa-user-circle-o"></i>CURSO</label>
                                <select name="curso_id" id="curso_id" onchange="turmas_disciplinas(this)" required>
                                    <option required>--Selecione--</option>
                                   @foreach ($cursos as $curso)
                                     <option value="{{$curso->id}}" required>{{$curso->nome}}</option>
                                   @endforeach
                                </select>
                               
                                <div class="invalid-feedback">
                                    Seleccione o seu curso
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="clear-top-margin" for="validationDefault01"><i class="fa fa-user-circle-o"></i>TURMA</label>
                                <select name="turma_id validationCustom02" required>
                                    <option required>--Selecione--</option>
                                   
                                </select>
                                <div class="invalid-feedback">
                                    Seleccione a sua turma
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="clear-top-margin" for="validationDefault01"><i class="fa fa-code"></i>DISCIPLINA</label>
                                <select name="disciplina_id" id="disciplina_id validationCustom03" required>
                                    <option required>--Selecione--</option>
                                 
                                </select>
                                <div class="invalid-feedback">
                                    Seleccione a sua disciplina
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="clear-top-margin" for="validationDefault01"><i class="fa fa-file-o"></i>TIPO AVALIAÇÃO</label>
                                <select name="tipo_avaliacao_id" id="tipo_avaliacao_id" required>
                                    <option required>--Selecione--</option>
                                   @foreach ($tipos_avaliacoes as $tipo_avaliacao)
                                     <option value="{{$tipo_avaliacao->id}}" required>{{$tipo_avaliacao->nome}}</option>
                                   @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Seleccione o tipo de avaliacao
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label><i class="fa fa-edit" for="validationDefault01"></i>OBSERVAÇÕES</label>
                                <textarea name="observacao" placeholder="OBSERVAÇÕES" id="validationCustom01" required></textarea>
                                <div class="invalid-feedback">
                                    Suas observacoes
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label><i class="fa fa-file-code-o" for="validationDefault01"></i>CARREGAR FICHEIRO</label>
                                <input class="file-input" type="file" name="ficheiro" id="ficheiro validationCustom01" required/>
                                <div class="invalid-feedback">
                                    Seleccione o seu ficheiro
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                               
                                <div class="custom-control custom-checkbox mr-sm-2 mb-3" id="chec">
                                    <input required type="checkbox" name="publicar"class=" custom-control-input" onclick="partilha(this);" id="verificar" value='1' />
                                
                                    <label class="custom-control-label" for="validationCustom01 verificar" style="font-size: 100%"  class="clear-top-margin">PARTILHAR</label>
                                </div>
                                <br><!--
                                <div id="chec" class="custom-control custom-checkbox mr-sm-2 mb-3">
                                    <input style="width:2rem; heigth:2rem;" type="checkbox" class="custom-control-input" value="1" 
                                    onclick="partilha(this);" id="verificar" name="publicar" required/>
                                    <label class="custom-control-label" for="verificar checkbox0" style="font-size: 100%">PARTILHAR</label>
                                </div>--->

                            </div>
                            
                            <script>
                                function partilha(valor){
                                   if(valor.checked==true){

                                        document.getElementById('data_entrega').style.display="block";

                                    }else{

                                        document.getElementById('data_entrega').style.display="none";
                                    }

                                }
                            </script>

                            <div class="col-sm-3" id="data_entrega"  style="display: none;">
                                <label class="clear-top-margin"><i class="fa fa-calendar"></i>DATA ENTREGA</label>
                                <input type="date" id="data_entrega" name="data_entrega">
                                <br><br>
                            </div>
                           
                            <div class="col-sm-12">                      

                                <button type="submit" id="bt1" class="btn btn-success"><i class="fa fa-paper-plane"></i> CRIAR</button>
                            
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection










