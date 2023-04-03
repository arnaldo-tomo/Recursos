@extends('layouts.principal_admin')
@section('conteudo')

					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<h5 class="page-title"><i class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-square-fill" viewBox="0 0 16 16">
								<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm.5 5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1 0-1zM4 8.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm2 3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
							  </svg></i>RELATÓRIOS</h5>
							<div class="section-divider"></div>
						</div>
					</div>
                    <div class="row" style="margin-top:-3.5rem">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-sm-8">
								<div>
									<div class="my-msg dash-item">
										<h6 class="item-title"><i class="fa fa-bar-chart"></i>ATENDIMENTO DOS ESTUDANTES DE HOJE</h6>
										<div class="inner-item">
											<div class="summary-chart">
												<canvas id="studentAttendenceBar" height="100px"></canvas>
												<br>
												<div class="chart-legends">
													<span class="red">AUSENTE</span>
													<span class="orange">DE LICENÇA</span>
													<span class="green">PRESENTE</span>
												</div>
												<br>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div>
									<div class="my-msg dash-item">
										<h6 class="item-title"><i class="fa fa-pie-chart"></i>PRESENÇA DO PROFESSOR</h6>
										<div class="chart-item">
											<canvas id="studentPie" height = 250px></canvas>
											<div class="chart-legends">
												<span class="red">AUSENTE</span>
													<span class="orange">DE LICENÇA</span>
													<span class="green">PRESENTE</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-sm-8">
								<div>
									<div class="my-msg dash-item">
										<h6 class="item-title"><i class="fa fa-bar-chart"></i>TENDÊNCIA DE ATENDIMENTO DOS ALUNOS</h6>
										<div class="inner-item">
											<div class="summary-chart">
												<canvas id="studentAttendenceLine" height="100px"></canvas>
												<div class="chart-legends">
													<span class="red">AUSENTE</span>
													<span class="orange">DE LICENÇA</span>
													<span class="green">PRESENTE</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

@endsection
