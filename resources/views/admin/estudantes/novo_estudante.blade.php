@extends('layouts.principal_admin')
@section('conteudo')


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-user"></i>NOVO ESTUDANTE</h5>
                <div class="section-divider"></div>
            </div>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger role">
                    <div class="display">
                        <strong> {{ $error }}</strong>
                    </div>
                </div>
            @endforeach
        @endif

        @if (session('estudante'))
            <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong>
                estudante criado com sucesso. <a class="btn btn-info" href="">Ver</a> <a class="btn btn-primary"
                    href="/todos_estudantes">Todos Estudantes</a>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <form action="/salvar_estudante" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>INFORMAÇÕES DO ESTUDANTE</h6>
                            <div class="inner-item">
                                <div class="dash-form">
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>APELIDO</label>
                                        <input type="text" required value="{{ old('apelido') }}"
                                            @error('apelido') is-invalid @enderror placeholder="Apelido" name="apelido"
                                            id="apelido" />
                                        @error('apelido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>OUTROS
                                            NOMES</label>
                                        <input type="text" name="name" required @error('name') is-invalid @enderror
                                            value="{{ old('name') }}" placeholder="Primeiro nome" id="name"
                                            onchange="atribuir_codigo(this);" />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-venus"></i>GÉNERO</label>
                                        <select id="genero_id" name="genero_id">
                                            <option>-- Selecione --</option>
                                            @foreach ($generos as $genero)
                                                <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                                            @endforeach
                                        </select>
                                        @error('genero_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-calendar"></i>DATA DE NASCIMENTO</label>
                                        <input type="text" id="studentDOB" name="data_nascimento" required
                                            @error('data_nascimento') is-invalid @enderror
                                            value="{{ old('data_nascimento') }}" placeholder="MM/DD/YYYY" />
                                        @error('data_nascimento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-phone"></i>CONTACTO PRINCIPAL</label>
                                        <input type="text" required @error('contacto') is-invalid @enderror
                                            value="{{ old('contacto') }}" placeholder="840000000" name="contacto"
                                            id="contacto" />
                                        @error('contacto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-envelope-o"></i>E-MAIL</label>
                                        <input type="text" required @error('email') is-invalid @enderror
                                            value="{{ old('email') }}" placeholder="info@eliteteclda.com" name="email"
                                            id="email" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-address-card"></i>BI</label>
                                        <input type="text" id="bi" name="bi" required
                                            @error('bi') is-invalid @enderror value="{{ old('bi') }}"
                                            placeholder="Documento de identificação" />
                                        @error('bi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-6">
                                        <label><i class="fa fa-address-card"></i>MORADA</label>
                                        <input type="text" id="morada" name="morada" required
                                            @error('morada') is-invalid @enderror value="{{ old('morada') }}"
                                            placeholder="RUA CORREIA DE BRITO" />
                                        @error('morada')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-map"></i>DISTRITO</label>
                                        <input type="text" name="distrito" id="distrito" required
                                            @error('distrito') is-invalid @enderror value="{{ old('distrito') }}"
                                            placeholder="" />
                                        @error('distrito')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-map"></i>PROVÍNCIA</label>
                                        <input type="text" name="provincia" id="provincia" required
                                            @error('provincia') is-invalid @enderror value="{{ old('provincia') }}"
                                            placeholder="" />
                                        @error('provincia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-file-picture-o"></i>UPLOAD FOTOGRAFIA</label>
                                        <input type="file" name="foto" id="foto" required
                                            @error('foto') is-invalid @enderror value="{{ old('foto') }}"
                                            placeholder="90890" />
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-file-picture-o"></i>Senha do Estudante</label>
                                        <input type="text" name="password" required
                                            @error('password') is-invalid @enderror {{ old('foto') }} id="Password"
                                            disabled />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <script>
                                        //Inicio do script para fazer o auto incremento do password do estudante
                                        function atribuir_codigo(valor) {
                                            var string = valor.value;
                                            var names = string.split(' ');
                                            var initials = "Password@";
                                            for (var i = 0; i < names.length; i++) {
                                                initials += names[i].substring(0, 1).toUpperCase();
                                            }

                                            // if (names.length > 1) {
                                            // initials += names[names.length - 1].substring(0, 1).toUpperCase();
                                            // }
                                            document.getElementById('Password').value = initials + 2022;
                                        }
                                        //Fim do scripts
                                    </script>


                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="dash-item">
                            <h6 class="item-title"><i class="fa fa-user-secret"></i>INFORMAÇÕES DOS ENCARREGADOS DE
                                EDUCAÇÃO</h6>
                            <div class="inner-item">
                                <div class="dash-form">
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>NOME DO
                                            PAI</label>
                                        <input type="text" name="nome_pai" required
                                            @error('nome_pai') is-invalid @enderror value="{{ old('nome_pai') }}"
                                            placeholder="JOHN" />
                                        @error('nome_pai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-briefcase"></i>PROFISSÃO</label>
                                        <input type="text" name="profissao_pai" required
                                            @error('profissao_pai') is-invalid @enderror
                                            value="{{ old('profissao_pai') }}" placeholder="EX: PROFESSOR" />
                                        @error('profissao_pai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-home"></i>LOCAL DE
                                            TRABALHO</label>
                                        <input type="text" name="local_trabalho_pai" required
                                            @error('local_trabalho_pai') is-invalid @enderror
                                            value="{{ old('local_trabalho_pai') }}" placeholder="LENNORE" />
                                        @error('local_trabalho_pai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-phone"></i>MORADA</label>
                                        <input type="text" name="morada_pai" required
                                            @error('morada_pai') is-invalid @enderror value="{{ old('morada_pai') }}"
                                            placeholder="" />
                                        @error('morada_pai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-user-circle-o"></i>NOME DA MÃE</label>
                                        <input type="text" name="nome_mae" required
                                            @error('nome_mae') is-invalid @enderror value="{{ old('nome_mae') }}"
                                            placeholder="JOHN" />
                                        @error('nome_mae')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-briefcase"></i>PROFISSÃO</label>
                                        <input type="text" name="profissao_mae" required
                                            @error('profissao_mae') is-invalid @enderror
                                            value="{{ old('profissao_mae') }}" placeholder="EX: PROFESSOR" />
                                        @error('profissao_mae')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-home"></i>LOCAL DE TRABALHO</label>
                                        <input type="text" name="local_trabalho_mae" required
                                            @error('local_trabalho_mae') is-invalid @enderror
                                            value="{{ old('local_trabalho_mae') }}" placeholder="LENNORE" />
                                        @error('local_trabalho_mae')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-phone"></i>MORADA</label>
                                        <input type="text" name="morada_mae" required
                                            @error('morada_mae') is-invalid @enderror value="{{ old('morada_mae') }}"
                                            placeholder="" />
                                        @error('morada_mae')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-home"></i>ENCARR. DE EDUCAÇÃO</label>
                                        <input type="text" name="nome_enc" required
                                            @error('apelido') is-invalid @enderror value="{{ old('nome_enc') }}"
                                            placeholder="Nome" />
                                        @error('apelido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-envelope-o"></i>E-MAIL</label>
                                        <input type="text" name="email_enc" required
                                            @error('email_enc') is-invalid @enderror value="{{ old('email_enc') }}"
                                            placeholder="exemplo@eliteteclda.com" />
                                        @error('email_enc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-phone"></i>CONTACTO</label>
                                        <input type="text" name="contacto_enc" required
                                            @error('contacto_enc') is-invalid @enderror value="{{ old('contacto_enc') }}"
                                            placeholder="8234545554" />
                                        @error('contacto_enc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-phone"></i>CONTACTO ALTERNATIVO</label>
                                        <input type="text" name="contacto_alternativo_enc" required
                                            @error('contacto_alternativo_enc') is-invalid @enderror
                                            value="{{ old('contacto_alternativo_enc') }}"
                                            placeholder="exemplo@eliteteclda.com" />
                                        @error('contacto_alternativo_enc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-briefcase"></i>PROFISSÃO</label>
                                        <input type="text" name="profissao_enc" required
                                            @error('contacto_alternativo_enc') is-invalid @enderror
                                            value="{{ old('profissao_enc') }}" placeholder="EX: PROFESSOR" />
                                        @error('contacto_alternativo_enc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-home"></i>LOCAL TRABALHO</label>
                                        <input type="text" name="local_trabalho_enc" required
                                            @error('local_trabalho_enc') is-invalid @enderror
                                            value="{{ old('local_trabalho_enc') }}" placeholder="90890" />
                                        @error('local_trabalho_enc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-3">
                                        <label><i class="fa fa-home"></i>MORADA</label>
                                        <input type="text" name="morada_enc" required
                                            @error('morada_enc') is-invalid @enderror value="{{ old('morada_enc') }}"
                                            placeholder="ex: rua correia de brito" />
                                        @error('morada_enc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="dash-item">
                            <h6 class="item-title"><i class="fa fa-book"></i>INFORMAÇÕES ACADÉMICAS</h6>
                            <div class="inner-item">
                                <div class="dash-form">
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-calendar"></i>ANO LECTIVO</label>
                                        <select name="ano_lectivo_id" id="ano_lectivo_id">


                                            <option value="{{ $ano_lectivo->id }}">{{ $ano_lectivo->Ano }}</option>

                                        </select>
                                        @error('ano_lectivo_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-book"></i>CURSO</label>
                                        <select name="curso_id" id="curso_id" onchange="turmas_disciplinas(this)">
                                            <option>-- Selecione --</option>
                                            @foreach ($cursos as $curso)
                                                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                            @endforeach

                                        </select>
                                        @error('curso_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-cogs"></i>REGIME</label>
                                        <select name="regime_id" id="regime_id">

                                            @foreach ($regimes as $regime)
                                                <option value="{{ $regime->id }}>">{{ $regime->nome }}</option>
                                            @endforeach
                                        </select>
                                        @error('regime_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-cogs"></i>TURMA</label>
                                        <select name="turma_id" id="turma_id" id="turma_id">
                                            <option>-- Selecione --</option>
                                            @foreach ($Turmas as $Turma)
                                                <option value="{{ $Turma->id }}">{{ $Turma->turma }}</option>
                                            @endforeach
                                        </select>
                                        @error('turma_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="col-sm-12">

                                        <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane"></i>
                                            SALVAR</button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

@endsection
