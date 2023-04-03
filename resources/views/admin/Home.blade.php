@extends('layouts.principal_admin')
@section('conteudo')
    <!--Inicio do conteudo principal do sistema-->

    <div class="container-fluid">
    
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <div id="ola" class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">ELITE ACADÉMICO</h4>
            </div>
        </div>
        <br>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-screen-desktop"></i></h3>
                                    <p class="text-muted">SALAS</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">23</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="p1" class="progress">
                                <div class="progress-bar bg-primary" role="progressbar"
                                    style="width: 85%; height: 6px; background-color:black;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-note"></i></h3>
                                    <p class="text-muted">PROFESSORES</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-cyan">46</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 100%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-doc"></i></h3>
                                    <p class="text-muted">DISCIPLINAS</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">16</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-bag"></i></h3>
                                    <p class="text-muted">FATURAS VENCIDAS</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">431</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Over Visitor, Our income , slaes different and  sales prediction -->
        <!-- ============================================================== -->
        <div class="row">
            <div style="margin-top: -3rem;" class="col-sm-8">
                <div>
                    <div class="my-msg dash-item">
                        <h6 class="item-title"><i class="fa fa-bar-chart"></i>TENDÊNCIA DE ATENDIMENTO DOS ALUNOS</h6>
                        <div class="inner-item">
                            <div class="summary-chart">
                                <canvas id="studentAttendenceBar" height="100px"></canvas>
                                <div class="chart-legends">
                                    <br>
                                    <span class="red">AUSENTE</span>
                                    <span class="orange">DE LICENÇA</span>
                                    <span class="green">PRESENTE</span>
                                    <br><br>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-4 col-md-12">
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-12">
                        <div class="card bg-cyan text-white">
                            <div class="card-body" id="tempo">
                                <div class="row weather">
                                    <div class="col-6 m-t-40">
                                        <h3>&nbsp;</h3>
                                        <div class="display-4">30<sup>°C</sup></div>
                                        <p class="text-white">BEIRA, MOZAMBIQUE</p>
                                    </div>
                                    <div class="col-6 text-right">
                                        <h1 class="m-b-"><i class="wi wi-day-cloudy-high"></i></h1>
                                        <b class="text-white">SUNNEY DAY</b>
                                        <p class="op-5">Janeiro 14</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-12">
                        <div class="card bg-primary text-white">
                            <div id="seg" class="card-body">
                                <div id="myCarouse2" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <h4 class="cmin-height">A amizade duplica<span class="font-medium"> as
                                                    alegrias e</span> divide as tristezas.</h4>
                                            <div class="d-flex no-block">
                                                <span><img src="../assets/images/users/1.jpg" alt="user"
                                                        width="50" class="img-circle"></span>
                                                <span class="m-l-10">
                                                    <h4 class="text-white m-b-0">Govinda</h4>
                                                    <p class="text-white">Actor</p>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <h4 class="cmin-height">Frases bonitas<span class="font-medium"> não nascem da
                                                    mente </span>e sim do coração!</h4>
                                            <div class="d-flex no-block">
                                                <span><img src="../assets/images/users/2.jpg" alt="user"
                                                        width="50" class="img-circle"></span>
                                                <span class="m-l-10">
                                                    <h4 class="text-white m-b-0">Govinda</h4>
                                                    <p class="text-white">Actor</p>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <h4 class="cmin-height">Saber encontrar<span class="font-medium"> a alegria na
                                                    alegria</span> dos outros, é o segredo da felicidade.</h4>
                                            <div class="d-flex no-block">
                                                <span><img src="../assets/images/users/3.jpg" alt="user"
                                                        width="50" class="img-circle"></span>
                                                <span class="m-l-10">
                                                    <h4 class="text-white m-b-0">Govinda</h4>
                                                    <p class="text-white">Actor</p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Comment - table -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
