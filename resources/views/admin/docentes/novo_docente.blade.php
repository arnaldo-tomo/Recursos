@extends('layouts.principal_admin')
@section('conteudo')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-user-secret"></i>NOVO DOCENTE</h5>
                <div class="section-divider"></div>
            </div>
        </div>

        @if (session('docente'))
            <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Parabens!</strong>
                docente criado com sucesso. <a class="btn btn-info" href="">Ver</a> <a class="btn btn-primary"
                    href="/todos_docentes">Todos Docentes</a>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
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
        <div class="row">
            <form action="/salvar_docente" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-md-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>INFORMAÇÕES DO DOCENTE</h6>
                            <div class="inner-item">
                                <div class="dash-form">
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>APELIDO</label>
                                        <input type="text" name="apelido" required value="{{ old('apelido') }}"
                                            placeholder="" required />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>OUTROS
                                            NOMES</label>
                                        <input type="text" name="name" required value="{{ old('name') }}"
                                            placeholder="" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-venus"></i>GÉNERO</label>
                                        <select name="genero_id">
                                            <option>-- Selecione --</option>
                                            @foreach ($generos as $genero)
                                                <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-calendar"></i>DATA DE NASCIMENTO</label>
                                        <input type="text" id="studentDOB" name="data_nascimento" required
                                            value="{{ old('data_nascimento') }}" placeholder="MM/DD/YYYY" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-phone"></i>CONTACTO</label>
                                        <input type="text" name="contacto" required value="{{ old('contacto') }}"
                                            placeholder="ex: 258846991708" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-phone"></i>CONTACTO ALTERNATIVO</label>
                                        <input type="text" name="contacto_alternativo" required
                                            value="{{ old('contacto_alternativo') }}" placeholder="ex: 258846991708" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-envelope-o"></i>E-MAIL</label>
                                        <input type="text" name="email" required value="{{ old('email') }}"
                                            placeholder="exemplo@eliteteclda.com" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-file-picture-o"></i>UPLOAD FOTOGRAFIA</label>
                                        <input type="file" name="foto" required value="{{ old('foto') }}"
                                            placeholder="90890" />
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="dash-item">
                            <h6 class="item-title"><i class="fa fa-home"></i>INFORMAÇÕES DE CONTACTO</h6>
                            <div class="inner-item">
                                <div class="dash-form">
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-home"></i>MORADA 1</label>
                                        <input type="text" name="morada" required value="{{ old('morada') }}"
                                            placeholder="ex: Rua Correia de Brito" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-home"></i>MORADA 2</label>
                                        <input type="text" name="morada2" required value="{{ old('morada2') }}"
                                            placeholder="ex: Rua Correia de Brito" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-flag"></i>NACIONALIDADE</label>
                                        <select id="nacionalidade" name="nacionalidade">
                                            <option>-- Selecione --</option>
                                            <option value="MOÇAMBICANA">MOÇAMBICANA</option>
                                            <option value="ESTRANGEIRA">ESTRANGEIRA</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-id-card"></i>LOCALIDADE</label>
                                        <input type="text" name="localidade" required value="{{ old('localidade') }}"
                                            placeholder="" />
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-code"></i>PROVÍNCIA</label>
                                        <input type="text" name="provincia" required value="{{ old('provincia') }}"
                                            placeholder="" />
                                    </div>


                                    <div class="clearfix"></div>
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
                                        <label class="clear-top-margin"><i class="fa fa-graduation-cap"></i>ÁREA DE
                                            FORMAÇÃO</label>
                                        <input type="text" name="area_formacao" required
                                            value="{{ old('area_formacao') }}" placeholder="ex: engenharia florestal" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-graduation-cap"></i>NÍVEL
                                            ACADÉMICO</label>
                                        <select name="nivel_academico_id">
                                            <option>-- Selecione --</option>
                                            @foreach ($niveis_academicos as $nivel)
                                                <option value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-building"></i>UNIVERSIDADE</label>
                                        <select name="universidade_id">
                                            <option>-- Selecione --</option>
                                            @foreach ($universidades as $universidade)
                                                <option value="{{ $universidade->id }}">{{ $universidade->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-calaendar"></i>ANO DE
                                            CONCLUSÃO</label>
                                        <input type="year" name="ano_conclusao" required
                                            value="{{ old('ano_conclusao') }}" placeholder="ex. 2010" />
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label class=""><i class="fa fa-puzzle-piece"></i>MÉDIA</label>
                                        <input type="text" name="media" required value="{{ old('media') }}"
                                            placeholder="ex: 14" />
                                    </div>

                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success"><i
                                                class="fa fa-paper-plane"></i>SUBMETER</button>
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
