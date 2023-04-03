@extends('layouts.principal_admin')
@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 clear-padding-xs">
            <h5 class="page-title"><i class="fa fa-user"></i>NOVA TURMA</h5>
            <div class="section-divider"></div>
        </div>
    </div>

    @if (session('turma'))
    <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong> turma
        criada com sucesso. <a class="btn btn-info" href="">Ver</a> <a class="btn btn-primary" href="/todos_estudantes">Todos Estudantes</a>
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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

</div>

<div class="row">

    <div class="col-lg-12 clear-padding-xs">
        <div class="col-md-12">
            <div class="dash-item first-dash-item">
                <h6 class="item-title"><i class="fa fa-user"></i>INFORMAÇÕES DA TURMA</h6>
                <div class="inner-item">
                    <div class="dash-form">
                        <form action="{{ route('salvar_turma') }}" method="POST">
                            @csrf
                            <div class="col-sm-6">
                                <label class="clear-top-margin"><i class=""></i>CURSO</label>
                                <select class="clear-top-margin" id="curso_id" name="curso_id" required>
                                    <option>-- Selecione --</option>
                                    @foreach ($cursos as $curso)
                                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>TURMA</label>
                                <input type="text" onchange="atribuir_codigo(this);" name="turma" id="turma" required />
                            </div>
                            <div class="col-sm-6">
                                <br><label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>CODIGO</label>
                                <input type="text" placeholder="" name="codigo" id="codigo" required />
                            </div><br>
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
                                    document.getElementById('codigo').value = initials;
                                }

                            </script>

                            <div class="col-sm-6">
                                <label><i class=""></i>LOTACAO MAXIMA</label>
                                <input type="number" name="lotacao_max" id="lotacao_max" min="10" />
                            </div>

                            <script>
                                function validar() {

                                    //Capturando os dados do input
                                    var lotacao = document.getElementById("lotacao_max");

                                    //Operador de condicao para validar se o input
                                    if (lotacao > 100) {
                                        alert("Voce o limite de lotacao");
                                    } else if (lotacao < 1) {
                                        alert("A lotacao minima deve ser igual a 1.");
                                    }

                                }

                            </script>

                            <div class="clearfix"></div>

                            <br>
                            <button class="btn btn-success" type="submit" onclick="validar()"><i class="fa fa-paper-plane"></i> SALVAR</button>

                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</form>
@endsection
