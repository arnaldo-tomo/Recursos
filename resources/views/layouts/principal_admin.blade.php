<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>ELITE ACADÉMICO</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!--Links diferenciados-->
    <link href="dashboard/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="dashboard/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="dashboard/assets/css/chartist.min.css" rel="stylesheet" media="screen">
    <link href="dashboard/assets/css/owl.carousel.min.css" rel="stylesheet" media="screen">
    <link href="dashboard/assets/css/owl.theme.default.min.css" rel="stylesheet" media="screen">
    <link href="dashboard/assets/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">

    <link href="dashboard/assets/css/responsive.dataTables.min.css" rel="stylesheet" media="screen">
    <!-- Select multiple -->
    <link href="dashboard/assets/plugins/select2/css/select2.min.css" rel="stylesheet" media="screen">
    <link href="dashboard/assets/css/style.css" rel="stylesheet" media="screen">

    {{-- Tabela Mudolo nas configuracao --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

</head>

<body class="skin-megna fixed-layout">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">ELITE ACADÉMICO</p>
        </div>
    </div>


    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        {{-- style="border:0; border-radius:0 0;background-color: ##6c757d;"> --}}
        {{-- style="border:0; border-radius:0 0;background-color: #07253F;"> --}}
        <!-- ============================================================== -->
        <!-- Logo #07253F; -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Logo -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light"
                style="border:0; border-radius:0 0;background-color: ##6c757d;">
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a
                                class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                                href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <form class=" d-none d-md-block d-lg-block">
                                {{-- <form class="app-search d-none d-md-block d-lg-block"> --}}
                                {{-- <input id="pesq" type="text" class="form-control" placeholder="Pesquisar"> --}}
                                <select class="form-control" name="" id="pesq">
                                    <option value="">2022</option>
                                    <option value="">2022</option>
                                    <option value="">2022</option>
                                </select>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notificações</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new
                                                        admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that
                                                        you have event</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this
                                                        template as you want</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                        admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);">
                                            <strong>Verificar todas notificações</strong> <i
                                                class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            {{-- <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="icon-note"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span>
                                </div>
                            </a> --}}
                            <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown"
                                aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">Voce tem 4 messagens</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/1.jpg"
                                                        alt="user" class="img-circle"> <span
                                                        class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                        admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/2.jpg"
                                                        alt="user" class="img-circle"> <span
                                                        class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See
                                                        you at</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/3.jpg"
                                                        alt="user" class="img-circle"> <span
                                                        class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span>
                                                    <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/4.jpg"
                                                        alt="user" class="img-circle"> <span
                                                        class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                        admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                        </li>
                    </ul>
                </div>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="../assets/images/users/1.jpg" alt="user" class=""> <span
                            class="hidden-md-down">Admin &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="fa fa-cogs"></i> DEFINIÇÕES</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="fa fa-users"></i> PERFIL DO
                            UTILIZADOR</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="fa fa-key"></i> ALTERAR
                            PASSWORD</a>
                        <!-- text-->
                        <br>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            class="dropdown-item"><i class="fa fa-power-off"></i> LOGOUT</a>
                        <!-- text-->
                        <form id="logout-form" action="logout" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                        <!-- text-->
                    </div>
                </li>
                <!-- ============================================================== -->
                </ul>
    </div>
    </nav>
    </header>
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <aside class="left-sidebar" style="overflow-y:scroll;">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    {{-- <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user-img"
                                class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li> --}}

                    @if (Auth::user()->user_access_id == 3)
                        {{-- <li>
                        <a  href="/"><i class="fa fa-home menu-icon"></i> Início</a>
                    </li> --}}
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="light-logo md-2" />
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        </b>
                        <li> <a class="waves-effect waves-dark" href="/" aria-expanded="false"><i
                                    class="fa fa-home text-success"></i><span class="hide-menu">Dashboard</span></a>
                        </li>



                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Matriculas
                                </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/novo_estudante">+Nova Matricula </a></li>
                                <li><a href="/todos_estudantes">Estudantes</a></li>
                                {{-- <li><a href="index3.html">Demographical</a></li>
                            <li><a href="index4.html">Modern</a></li> --}}
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/inscricoes_estudantes"
                                aria-expanded="false"><i class="fa fa-book"></i><span
                                    class="hide-menu">Inscrições</span></a></li>
                        {{-- <li class="dropdown">s
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-users menu-icon"></i> ESTUDANTES <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/novo_estudante"><i class="fa fa-caret-right"></i>+NOVO ESTUDANTE</a>
                            </li>
                            <li>
                                <a href="/todos_estudantes"><i class="fa fa-caret-right"></i>TODOS ESTUDANTES  </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li> --}}

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="fa fa-user-secret"></i><span
                                    class="hide-menu">Docentes </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/novo_docente">+Novo Docente </a></li>
                                <li><a href="/todos_docentes">Todos Docentes</a></li>
                                <li><a href="/docente_disciplinas">Disciplinas</a></li>
                                {{-- <li><a href="index3.html">Demographical</a></li>
                            <li><a href="index4.html">Modern</a></li> --}}
                            </ul>
                        </li>
                        {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user-secret menu-icon"></i> DOCENTES <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/novo_docente"><i class="fa fa-caret-right"></i>+NOVO DOCENTE</a>
                            </li>
                            <li>
                                <a href="/todos_docentes"><i class="fa fa-caret-right"></i>TODOS DOCENTES</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li> --}}
                        {{-- <li>
                        <a href="message.html"><i class="fa fa-envelope menu-icon"></i> MINHAS MENSAGENS</a>
                    </li> --}}
                        {{-- <li> <a class="waves-effect waves-dark" href="/gestao_anuncios" aria-expanded="false"><i class="fa fa-bullhorn menu-icon"></i><span class="hide-menu">Anúncios</span></a></li> --}}
                        <li> <a class="waves-effect waves-dark" href="/gestao_cursos" aria-expanded="false"><i
                                    class="ti-layout-tab"></i><span class="hide-menu">Cursos</span></a></li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-layout-grid3"></i><span class="hide-menu">Turmas
                                </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('nova_turma') }}">+Nova Turma </a></li>
                                <li><a href="/gestao_turmas">Turmas</a></li>
                                {{-- <li><a href="index3.html">Demographical</a></li>
                            <li><a href="index4.html">Modern</a></li> --}}
                            </ul>
                        </li>

                        {{-- <li>
                        <a href="/gestao_anuncios"><i class="fa fa-bullhorn menu-icon"></i>ANÚNCIOS</a>
                    </li> --}}
                        {{-- <li>
                        <a href="/gestao_cursos"><i class="fa fa-file menu-icon"></i>CURSOS</a>
                    </li> --}}
                        {{-- <li>
                        <a href="/gestao_turmas"><i class="fa fa-file-o menu-icon"></i>TURMAS</a>
                    </li> --}}

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="fa fa-book menu-icon"></i><span
                                    class="hide-menu">Disciplinas </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/gestao_disciplinas">+Nova Disciplina </a></li>
                                <li><a href="/ver_disciplinas">Disciplinas</a></li>
                                {{-- <li><a href="index3.html">Demographical</a></li>
                            <li><a href="index4.html">Modern</a></li> --}}
                            </ul>
                        </li>

                        {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-book menu-icon"></i> DISCIPLINAS <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/gestao_disciplinas"><i class="fa fa-caret-right"></i>+NOVA DISCIPLINA</a>
                            </li>
                            <li>
                                <a href="/ver_disciplinas"><i class="fa fa-caret-right"></i>DISCIPLINAS</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li> --}}
                        {{-- <li> <a class="waves-effect waves-dark" href="/ver_tipo_avaliacao" aria-expanded="false"><i
                                    class="ti-files"></i><span class="hide-menu">Tipo Avaliação</span></a></li> --}}

                        {{-- <li ><a href="/ver_tipo_avaliacao">TIPO AVALIAÇÃO  </a></li> --}}

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-calendar"></i><span class="hide-menu">Horários
                                </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/criar_horario">Criar </a></li>
                                <li><a href="/ver_horario">Ver </a></li>
                                <li><a href="/turnos">Turnos </a></li>
                                <li><a href="/tempos">Tempos </a></li>
                                {{-- <li><a href="index3.html">Demographical</a></li>
                            <li><a href="index4.html">Modern</a></li> --}}
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-money"></i><span class="hide-menu">Propinas
                                </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <a href="/pagar_propina"><i class="fa fa-caret-right"></i>Efetuar Pagamento</a>
                        </li>
                        <li>
                            <a href="/ver_pagamentos"><i class="fa fa-caret-right"></i>Ver Pagamentos</a>
                        </li>
                        <li>
                            <a href="/criar_propinas"><i class="fa fa-caret-right"></i>Criar</a>

                </ul>
                </li>

                {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-calendar menu-icon"></i> HORÁRIOS <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/criar_horario"><i class="fa fa-caret-right"></i>CRIAR</a>
                            </li>
                            <li>
                                <a href="/ver_horario"><i class="fa fa-caret-right"></i>VER</a>
                            </li>
                            <li>
								<a href="/turnos"><i class="fa fa-caret-right"></i>Turnos</a>
							</li>
							<li>
								<a href="/tempos"><i class="fa fa-caret-right"></i>Tempos</a>
							</li>
                        </ul>
                        <div class="clearfix"></div>
                    </li> --}}

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-bar-chart-alt "></i><span class="hide-menu">Relatórios </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/aproveitmento">Aproveitamento </a></li>
                        <li><a href="/propinas">Propinas </a></li>

                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="fa fa-cog "></i><span class="hide-menu">Configuração </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a class="waves-effect waves-dark" href="/ano_lectivo" aria-expanded="false"><i
                                    class="fa fa-calendar"></i><span class="hide-menu">Ano Lectivo</span></a></li>
                        <li><a href="/configuracao"><i class="fa fa-caret-right"></i>Criar Mudulos & semestre</a></li>
                        <li><a href="/ver_tipo_avaliacao"><i class="fa fa-caret-right"></i>Tipo Avaliação </a></li>

                    </ul>
                </li>
                {{--
                <li>
                    <a class="waves-effect waves-dark" href="/configuracao" aria-expanded="false"><i
                            class="fa fa-cog"></i><span class="hide-menu">Configuração</span></a>

                </li> --}}


                {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-address-card menu-icon"></i> RELATÓRIOS <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a  href="/relatorio"><i class="fa fa-caret-right"></i>NOTAS</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li> --}}
            @elseif(Auth::user()->user_access_id == 2)
                {{-- docentes --}}

                {{-- <li> <a class="waves-effect waves-dark" href="/"><i class="fa fa-home menu-icon"></i><span class="hide-menu">INICIO </span></a> --}}
                <li> <a class="waves-effect waves-dark" href="/" aria-expanded="false"><i
                            class="fa fa-home text-success"></i><span class="hide-menu">Início</span></a></li>

                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-pencil-alt "></i><span class="hide-menu">Avaliações </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/criar_avaliacao">Criar </a></li>
                        <li><a href="/dowloand_avaliacao">Download </a></li>

                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-briefcase"></i><span class="hide-menu">Materiais</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/criar_material">Criar</a></li>
                        <li><a href="/dowloand_material">Dowloand</a></li>
                    </ul>
                </li>
                <li> <a id="risco" class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="ti-write">
                        </i><span class="hide-menu">Notas <span
                                class="badge badge-pill badge-primary text-white ml-auto"></span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/criar_classificacao">Criar</a></li>
                        <li><a href="/ver_notas">Ver</a></li>
                        <li><a href="/ver_pautas">Pautas Frequencia</a></li>
                        <li><a href="/ver_pautas_exames">Pautas exames</a></li>
                    </ul>
                </li>
                <li> <a class="waves-effect waves-dark" href="/horario_docentes"><i class="ti-calendar">
                        </i><span class="hide-menu">Horários</span></a>



                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-bar-chart-alt">
                            <path
                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm.5 5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1 0-1zM4 8.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm2 3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z" />
                        </i><span class="hide-menu">Relatórios</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/relatorio">Notas</a></li>
                    </ul>
                </li>
            @elseif(Auth::user()->user_access_id == 1)
                {{-- estudantes --}}

                <li> <a class="waves-effect waves-dark" href="/" aria-expanded="false"><i
                            class="fa fa-home text-success"></i><span class="hide-menu">Início</span></a></li>

                {{-- <li>
                        <a href="/"><i class="fa fa-home menu-icon"></i> Início</a>
                    </li> --}}

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-pencil-alt "></i><span class="hide-menu">Avaliações </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/download_avaliacao_estudante">Downbload </a></li>
                        <li><a href="/upload_avaliacao">Upload </a></li>

                    </ul>
                </li>



                <li> <a class="waves-effect waves-dark" href="/materiais_academicos" aria-expanded="false"><i
                            class="ti-briefcase"></i><span class="hide-menu">Materiais</span></a></li>


                {{-- <li>
                        <a href="/materiais_academicos"><i class="fa fa-file-o menu-icon"></i>MATERIAIS</a>
                    </li> --}}
                {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bar-chart menu-icon"></i> PRESENÇA <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="student-attendence.html"><i class="fa fa-caret-right"></i>RESUMO</a>
                            </li>
                            <li>
                                <a href="student-attendence-detailed.html"><i class="fa fa-caret-right"></i>DETALHADO</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li>
                    <li>
                        <a href="message.html"><i class="fa fa-envelope menu-icon"></i> MINHAS MENSAGENS</a>
                    </li> --}}

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-write "></i><span class="hide-menu">Ver Notas </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/notas_frequencia">Notas de Frequência </a></li>
                        <li><a href="/notas_exame">Notas de Exames </a></li>

                    </ul>
                </li>
                {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-address-card menu-icon"></i> VER NOTAS <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/notas_frequencia"><i class="fa fa-caret-right"></i>NOTAS DE FREQUÊNCIA</a>
                            </li>
                            <li>
                                <a href="/notas_exame"><i class="fa fa-caret-right"></i>NOTAS DE EXAMES</a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </li> --}}

                <li> <a class="waves-effect waves-dark" href="/horarios_estudantes" aria-expanded="false"><i
                            class="ti-calendar"></i><span class="hide-menu">Horários</span></a></li>
                {{--
                    <li>
                        <a href="/horarios_estudantes"><i class="fa fa-calendar menu-icon"></i>HORÁRIOS</a>
                    </li> --}}

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-file "></i><span class="hide-menu">Exames </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/juris">Júris </a></li>
                        <li><a href="/calendario_exames">Calendário </a></li>

                    </ul>
                </li>
                {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-book menu-icon"></i> EXAMES <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/juris"><i class="fa fa-caret-right"></i>JÚRIS</a>
                            </li>
                            <li>
                                <a href="/calendario_exames"><i class="fa fa-caret-right">CALENDÁRIO</i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li> --}}

                <li>
                    {{-- <a href="/"><i class="fa fa-money menu-icon"></i> PROPINAS</a> --}}
                <li> <a class="waves-effect waves-dark" href="/propinas" aria-expanded="false"><i
                            class="ti-money"></i><span class="hide-menu">PROPINAS</span></a></li>
                </li>
            @elseif(Auth::user()->user_access_id == 4)
                {{-- Finanças --}}

                <li>
                    <a href="/home"><i class="fa fa-home menu-icon"></i> Início</a>
                </li>


                {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bar-chart menu-icon"></i> PRESENÇA <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="student-attendence.html"><i class="fa fa-caret-right"></i>RESUMO</a>
                                </li>
                                <li>
                                    <a href="student-attendence-detailed.html"><i class="fa fa-caret-right"></i>DETALHADO</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </li> --}}
                <li>
                    <a href="message.html"><i class="fa fa-envelope menu-icon"></i> MINHAS MENSAGENS</a>
                </li>
                <li>
                <li> <a class="waves-effect waves-dark" href="/pagar_propina" aria-expanded="false"><i
                            class="ti-money"></i><span class="hide-menu">PROPINAS</span></a></li>
                </li>
                @endif
                <li>
                    <a class=" waves-effect waves-dark"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                        href="{{ route('logout') }}">
                        <i class="fa fa-power-off menu-icon"></i>
                        <span class="hide-menu">Terminar Sessão</span></a>
                    <form id="logout-form" action="logout" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                </ul>
        </div>
        </ul>
        </nav>
        <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

            <br>

            @yield('conteudo')

            <br>

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
        Copyright Elite Tec, Lda
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="../assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="dist/js/dashboard1.js"></script>
    <script src="../assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="../assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="../assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="dist/js/dashboard1.js"></script>
    <script src="../assets/node_modules/toast-master/js/jquery.toast.js"></script>

    <!--Inicio dos links diferentes-->
    <script src="dashboard/assets/js/jQuery_v3_2_0.min.js"></script>
    <script src="dashboard/assets/js/jquery-ui.min.js"></script>
    <script src="dashboard/assets/js/bootstrap.min.js"></script>
    <script src="dashboard/assets/plugins/owl.carousel.min.js"></script>
    <script src="dashboard/assets/plugins/Chart.min.js"></script>
    <script src="dashboard/assets/plugins/jquery.dataTables.min.js"></script>
    <script src="dashboard/assets/plugins/dataTables.responsive.min.js"></script>
    <script src="dashboard/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="dashboard/assets/js/js.js"></script>
    <script src="js/validator.min.js"></script>

    <!--Link da pasta de contendo o ficheiro de validacao do formularios-->\
    <script src="./dist/bootstrap-validator-master/dist/validator.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>
    {{-- Tabela Mudolo nas configuracao --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
        $(document).ready(function() {
            $('#table_id0').DataTable();
        });
        $(document).ready(function() {
            $('#table_id1').DataTable();
        });
        $(document).ready(function() {
            $('#table_id2').DataTable();
        });
        $(document).ready(function() {
            $('#table_id3').DataTable();
        });
        $(document).ready(function() {
            $('#table_id4').DataTable();
        });
        $(document).ready(function() {
            $('#table_id5').DataTable();
        });
        $(document).ready(function() {
            $('#table_id6').DataTable();
        });
    </script>
    {{--  fim Tabela Mudolo nas configuracao --}}


    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

    <script>
        function estudantes_turma(turma) {
            var turma_id = turma.value;

            $.get('/json-estudantes?turma_id=' + turma_id, function(data) {
                console.log(data);

                $('#estudante_id').empty();

                $('#estudante_id').append('<option value="">--Selecione--</option>');

                $.each(data, function(index, usuario) {
                    $('#estudante_id').append('<option value="' + usuario.id + '">' + usuario.name + ' ' +
                        usuario.apelido + '</option>');
                })
            });

        }
    </script>


    <script>
        function turmas_disciplinas(curso) {

            var curso_id = curso.value;

            $.get('/json-turmas?curso_id=' + curso_id, function(data) {

                console.log(data);

                $('#turma_id').empty();
                $('#turma_id').append('<option value="" disable="true" selected="true" >--Selecione--</option>');

                $.each(data, function(index, turma) {
                    $('#turma_id').append('<option value="' + turma.id + '">' + turma.turma + '</option>');
                })
            })

            $.get('/json-disciplinas?curso_id=' + curso_id, function(data) {
                console.log(data);

                $('#disciplina_id').empty();
                $('#disciplina_id').append(
                    '<option value="" disable="true" selected="true" >--Selecione--</option>');

                $.each(data, function(index, disciplina) {
                    $('#disciplina_id').append('<option value="' + disciplina.id + '">' + disciplina.nome +
                        '</option>');
                })

            });

        }

        function mostrar_nivel(curso) {
            var curso_id = curso.value;

            $.get('/json-nivel?curso_id=' + curso_id, function(data) {
                console.log(data);

                $('#nivel_id').empty();

                $('#nivel_id').append('<option value="">--Selecione--</option>');

                $.each(data, function(index, nivel) {
                    $('#nivel_id').append('<option value="' + nivel.id + '">' + nivel.nivel + '</option>');
                })
            });

        }
    </script>




    <script>
        'undefined' === typeof _trfq || (window._trfq = []);
        'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({
            'tccl.baseHost': 'secureserver.net'
        }), _trfd.push({
            'ap': 'cpsh-oh'
        }, {
            'server': 'sg2plzcpnl466829'
        }, {
            'id': '7770191'
        }) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
    </script>
    <script src='../../../../../../img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>


</body>

</html>
