@extends('layouts.principal_admin')
@section('conteudo')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-code"></i>CRIAR MATERIAIS DE ESTUDOS</h5>
            <div class="section-divider"></div>
        </div>
    </div>

    @if(session('material'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> {{ session('material') }}. 
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <div class="col-xs-12">
                <div class="dash-item first-dash-item">
                    <h6 class="item-title"><i class="fa fa-edit"></i>NOVO MATERIAL</h6>
                    <form action="/salvar_material" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="inner-item">
                        <div class="dash-form">
                            <div class="col-sm-3">
                                <label for="validationDefault01" class="clear-top-margin"><i class="fa fa-user-circle-o"></i>CURSO</label>
                                <select name="curso_id" id="curso_id" onchange="turmas_disciplinas(this)" required>
                                    <option required>--Selecione--</option>
                                   @foreach ($cursos as $curso)
                                     <option value="{{$curso->id}}" >{{$curso->nome}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="validationDefault01" class="clear-top-margin"><i class="fa fa-user-circle-o"></i>TURMA</label>
                                <select name="turma_id" id="turma_id" required>
                                    <option required>--Selecione--</option>
                                   
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="validationDefault01" class="clear-top-margin"><i class="fa fa-code"></i>DISCIPLINA</label>
                                <select name="disciplina_id" id="disciplina_id" required>
                                    <option required>--Selecione--</option>
                                 
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="clear-top-margin" for="validationDefault01"><i class="fa fa-edit"></i>NOME</label>
                                <input type="text" id="validationDefault01" name="nome" placeholder="Nome" class="form-control"
                                pattern="[A-Za-z ]{1,32}" title="o seu nome nao deve conter @ e numero" required/>
                            </div>
                            <div class="col-sm-12">
                                <label for="validationDefault01"><i class="fa fa-edit"></i>OBSERVAÇÕES</label>
                                <textarea name="observacao" placeholder="OBSERVAÇÕES" required></textarea>
                            </div>
                            <div class="col-sm-12">
                                <label><i class="fa fa-file-code-o" for="validationDefault01"></i>CARREGAR FICHEIRO</label>
                                <input class="file-input" type="file" name="ficheiro" id="ficheiro" required/>
                            </div>
                            <div class="col-sm-12" id="but">                      

                                <button id="bt1" type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i>CRIAR</button>
                                
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