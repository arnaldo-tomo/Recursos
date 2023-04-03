
@extends('layouts.principal_website')
@section('conteudo')
    

        <div class="row" >
            <div id="homeSlider" class="carousel slide" data-ride="carousel" >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#homeSlider" data-slide-to="0" class="active"></li>
                    <li data-target="#homeSlider" data-slide-to="1"></li>
					<li data-target="#homeSlider" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="assets/img/slider/slide4.jpg" alt="slide1">
                        <div class="carousel-caption">
							<h4><i class="fa fa-star-o"></i>RIGOR QUALIDADE E INOVAÇÃO<i class="fa fa-star-o"></i></h4>
                            <h2>INSCRIÇÕES ABERTAS PARA NOVOS INGRESSOS</h2>
                            <p style="color: black"> <b>De 15 de outubro a 15 de Janeiro! faça já a sua inscrição</b> </p>
                            <a href="#"><i class="fa fa-paper-plane"></i>SABER MAIS</a>
                        </div>
                    </div>

                    <div class="item">
                        <img src="assets/img/slider/slide5.jpg" alt="slide2">
                        <div class="carousel-caption">
							<h4><i class="fa fa-star-o"></i>RIGOR QUALIDADE E INOVAÇÃO<i class="fa fa-star-o"></i></h4>
                            <h2>FORMAMOS TÉNICOS MÉDIOS EM SAÚDE</h2>
                            <p>Basta ter concluido a 10ª ou 12ª Classe do SNE.</p>
                            <a href="#"><i class="fa fa-paper-plane"></i>KNOW MORE</a>
                        </div>
                    </div>
					<div class="item">
                        <img src="assets/img/slider/slide6.jpg" alt="slide2">
                        <div class="carousel-caption">
                            <h4><i class="fa fa-star-o"></i>RIGOR QUALIDADE E INOVAÇÃO<i class="fa fa-star-o"></i></h4>
                            <h2><span><i class="fa fa-rocket"></i></span>JORNADAS CIENTÍFICA ESCOLAR PARA O ANO DE 2021</h2>
							<p><strong>AS JORNADAS CIENTIFICAS INICIAM DE 25 DE NOVEMBRO A 10 DE DEZEMBRO DE 2021</strong></p>
                            <a href="#"><i class="fa fa-paper-plane"></i>KNOW MORE</a>
                        </div>
                    </div>
                </div>

                <!-- Slide Controls -->
                <a class="left carousel-control" href="#homeSlider" role="button" data-slide="prev">
                    <span class="fa fa-arrow-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#homeSlider" role="button" data-slide="next">
                    <span class="fa fa-arrow-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
		
		<!-- Principal Intro Section -->
		<div class="row principal-intro-row">
			<div class="container">
				<div class="col-sm-5">
					<img src="assets/img/principal1.jpg" alt="Our Principal"/>
				</div>
				<div class="col-sm-7 principal-intro">
					<h6><i class="fa fa-star-o"></i><span>MEET OUR STAR</span><i class="fa fa-star-o"></i></h6>
					<h3>MEET OUR PRINCIPAL</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					<h6 class="principal-name">Mr JOHN DOE, M.D, P.C</h6>
					<div>
						<a href="#" class="know-more-btn"><i class="fa fa-paper-plane"></i>KNOW MORE</a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Events Section -->
		
		<div class="row section-row evets-row">
			<div class="container">
				<div class="section-row-header-center">
					<h6><i class="fa fa-star-o"></i>WE ARE BEST<i class="fa fa-star-o"></i></h6>
					<h1>EVENTS - NEWS</h1>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
				</div>
				<div class="col-sm-12">
					<div class="event-tab-link-box">
						<div class="pull-mid">
							<ul class="nav nav-tabs">
								<li class="active">
									<a  href="#1" data-toggle="tab"><i class="fa fa-graduation-cap"></i><span>ACADEMICS</span></a>
								</li>
								<li>								
									<a href="#2" data-toggle="tab"><i class="fa fa-users"></i><span>ADMISSIONS</span></a>
								</li>
								<li>								
									<a href="#3" data-toggle="tab"><i class="fa fa-trophy"></i><span>SPORTS</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="tab-content">
					<div class="tab-pane active" id="1">
						<div class="col-md-8 left-event-items">
								<div class="event-item">
									<div class="col-sm-7">
										<div class="event-date">
											<p><span>10</span> SEP</p>
										</div>
										<h3>Annual Science Fest</h3>
										<h6><i class="fa fa-map-marker"></i>Sciene Building</h6>
										<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
									</div>
									<div class="col-sm-5 event-item-img">
										<div class="event-img">
											<img src="assets/img/news/news-sm1.jpg" alt="event" />
											<div class="event-detail-link">
												<a href="#">VIEW DETAILS</a>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="event-item">
									<div class="col-sm-7">
										<div class="event-date">
											<p><span>21</span> AUG</p>
										</div>
										<h3>Inter School Sports Meet</h3>
										<h6><i class="fa fa-map-marker"></i>Playground</h6>
										<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
									</div>
									<div class="col-sm-5 event-item-img">
										<div class="event-img">
											<img src="assets/img/news/news-sm2.jpg" alt="event" />
											<div class="event-detail-link">
												<a href="#">VIEW DETAILS</a>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
						</div>
						<div class="col-md-4 right-event-items">
							<div class="event-item">
								<img src="assets/img/news/news-lg3.jpg" alt="event" />
							</div>
							<div class="featured-event">
								<div class="event-date">
									<p><span>10</span> SEP</p>
								</div>
								<h3>Inter School Sports Meet</h3>
								<h6><i class="fa fa-map-marker"></i>Playground</h6>
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
								<a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="2">
						<div class="col-md-8 left-event-items">
								<div class="event-item">
									<div class="col-sm-7">
										<div class="event-date">
											<p><span>10</span> SEP</p>
										</div>
										<h3>Annual Science Fest</h3>
										<h6><i class="fa fa-map-marker"></i>Sciene Building</h6>
										<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
									</div>
									<div class="col-sm-5 event-item-img">
										<div class="event-img">
											<img src="assets/img/news/news-sm2.jpg" alt="event" />
											<div class="event-detail-link">
												<a href="#">VIEW DETAILS</a>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="event-item">
									<div class="col-sm-7">
										<div class="event-date">
											<p><span>21</span> AUG</p>
										</div>
										<h3>Inter School Sports Meet</h3>
										<h6><i class="fa fa-map-marker"></i>Playground</h6>
										<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
									</div>
									<div class="col-sm-5 event-item-img">
										<div class="event-img">
											<img src="assets/img/news/news-sm1.jpg" alt="event" />
											<div class="event-detail-link">
												<a href="#">VIEW DETAILS</a>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
						</div>
						<div class="col-md-4 right-event-items">
							<div class="event-item">
								<img src="assets/img/news/news-lg3.jpg" alt="event" />
							</div>
							<div class="featured-event">
								<div class="event-date">
									<p><span>10</span> SEP</p>
								</div>
								<h3>Inter School Sports Meet</h3>
								<h6><i class="fa fa-map-marker"></i>Playground</h6>
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
								<a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="3">
						<div class="col-md-8 left-event-items">
								<div class="event-item">
									<div class="col-sm-7">
										<div class="event-date">
											<p><span>10</span> SEP</p>
										</div>
										<h3>Annual Science Fest</h3>
										<h6><i class="fa fa-map-marker"></i>Sciene Building</h6>
										<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
									</div>
									<div class="col-sm-5 event-item-img">
										<div class="event-img">
											<img src="assets/img/news/news-sm2.jpg" alt="event" />
											<div class="event-detail-link">
												<a href="#">VIEW DETAILS</a>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="event-item">
									<div class="col-sm-7">
										<div class="event-date">
											<p><span>21</span> AUG</p>
										</div>
										<h3>Inter School Sports Meet</h3>
										<h6><i class="fa fa-map-marker"></i>Playground</h6>
										<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
									</div>
									<div class="col-sm-5 event-item-img">
										<div class="event-img">
											<img src="assets/img/news/news-sm3.jpg" alt="event" />
											<div class="event-detail-link">
												<a href="#">VIEW DETAILS</a>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
						</div>
						<div class="col-md-4 right-event-items">
							<div class="event-item">
								<img src="assets/img/news/news-lg3.jpg" alt="event" />
							</div>
							<div class="featured-event">
								<div class="event-date">
									<p><span>10</span> SEP</p>
								</div>
								<h3>Inter School Sports Meet</h3>
								<h6><i class="fa fa-map-marker"></i>Playground</h6>
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
								<a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Our Teaacher section -->
		<div class="row section-row teacher-row">
			<div class="container">
				<div class="section-row-header-center">
					<h6><i class="fa fa-star-o"></i>WE ARE BEST<i class="fa fa-star-o"></i></h6>
					<h1>MEET OUR TEACHERS</h1>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
				</div>
				<div class="owl-carousel" id="ourTeacher">
					<div class="teacher-item">
						<h5><i class="fa fa-flask"></i>ORGANIC CHEMISTRY</h5>
						<div class="teacher-item-inner">
							<p class="teacher-desc">
								It is a long established fact that a reader will be distracted by the readable content 
								of a page when looking at its layout.
							</p>
							<div class="col-xs-4 clear-padding teacher-img">
								<img src="assets/img/parent/parent2.jpg" alt="teacher" />
							</div>
							<div class="col-xs-8 teacher-details">
								<p><strong>John Doe</strong></p>
								<p><i>MSc. Chemistry</i></p>
								<p>
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="teacher-know-more-link">
							<a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>
						</div>
					</div>
					<div class="teacher-item">
						<h5><i class="fa fa-flash"></i>ELECTROSTATICS</h5>
						<div class="teacher-item-inner">
							<p class="teacher-desc">
								It is a long established fact that a reader will be distracted by the readable content 
								of a page when looking at its layout.
							</p>
							<div class="col-xs-4 clear-padding teacher-img">
								<img src="assets/img/parent/parent1.jpg" alt="teacher" />
							</div>
							<div class="col-xs-8 teacher-details">
								<p><strong>Lenore Doe</strong></p>
								<p><i>Ph.D. Physics</i></p>
								<p>
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="teacher-know-more-link">
							<a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>
						</div>
					</div>
					<div class="teacher-item">
						<h5><i class="fa fa-heartbeat"></i>HUMAN BIOLOGY</h5>
						<div class="teacher-item-inner">
							<p class="teacher-desc">
								It is a long established fact that a reader will be distracted by the readable content 
								of a page when looking at its layout.
							</p>
							<div class="col-xs-4 clear-padding teacher-img">
								<img src="assets/img/parent/parent2.jpg" alt="teacher" />
							</div>
							<div class="col-xs-8 teacher-details">
								<p><strong>John Doe</strong></p>
								<p><i>Ph.D. Biology</i></p>
								<p>
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="teacher-know-more-link">
							<a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>
						</div>
					</div>
					<div class="teacher-item">
						<h5><i class="fa fa-code"></i>COMPUTER SCIENCE</h5>
						<div class="teacher-item-inner">
							<p class="teacher-desc">
								It is a long established fact that a reader will be distracted by the readable content 
								of a page when looking at its layout.
							</p>
							<div class="col-xs-4 clear-padding teacher-img">
								<img src="assets/img/parent/parent1.jpg" alt="teacher" />
							</div>
							<div class="col-xs-8 teacher-details">
								<p><strong>Lenore Doe</strong></p>
								<p><i>Ph.D. Physics</i></p>
								<p>
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="teacher-know-more-link">
							<a href="#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>
						</div>
					</div>
				</div>
			</div>	
		</div>
		
		<!-- News Section -->
		<div class="row section-row">
			<div class="container">
				<div class="section-row-header-center">
					<h6><i class="fa fa-star-o"></i>WE ARE BEST<i class="fa fa-star-o"></i></h6>
					<h1>LATEST NEWS</h1>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="news-item-container">
						<div class="news-img">
							<img src="assets/img/news/news-sm1.jpg" alt="news"/>
							<div class="news-item-date">
								<h6><i class="fa fa-calendar"></i>08, AUG</h6>
							</div>
						</div>
						<div class="news-item">
							<h5>NEW ACADEMIC CALENDER</h5>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
							<a href="#"><i class="fa fa-paper-plane"></i>VIEW DETAILS</a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="news-item-container">
						<div class="news-img">
							<img src="assets/img/news/news-sm2.jpg" alt="news"/>
							<div class="news-item-date">
								<h6><i class="fa fa-calendar"></i>13, JUL</h6>
							</div>
						</div>
						<div class="news-item">
							<h5>EXAM RESULTS OUT</h5>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
							<a href="#"><i class="fa fa-paper-plane"></i>VIEW DETAILS</a>
						</div>
					</div>
				</div>
				<div class="clearfix visible-sm-block"></div>
				<div class="col-sm-6 col-md-4">
					<div class="news-item-container">
						<div class="news-img">
							<img src="assets/img/news/news-sm3.jpg" alt="news"/>
							<div class="news-item-date">
								<h6><i class="fa fa-calendar"></i>11, JUN</h6>
							</div>
						</div>
						<div class="news-item">
							<h5>EXAM DATES</h5>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
							<a href="#"><i class="fa fa-paper-plane"></i>VIEW DETAILS</a>
						</div>
					</div>
				</div>
				<div class="clearfix visible-lg visible-md visible-sm"></div>
				<div class="view-all-link">
					<a href="#"><i class="fa fa-paper-plane"></i>VIEW ALL</a>
				</div>
			</div>
		</div>
		
		<!-- Parent testimonial section -->
		<div class="row parent-test-row section-row">
			<div class="container">
				<div class="section-row-header-center">
					<h1>WHAT PARENTS SAY</h1>
				</div>
				<div class="owl-carousel" id="parentTestimonial">
					<div class="parent-test-item">
						<div class="col-sm-3">
							<div class="parent-img">
								<img src="assets/img/parent/parent1.jpg" alt="parent"/>
							</div>
						</div>
						<div class="col-sm-9">
							<p class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
							<p><i>"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."</i></p>
							<p class="parent-details"><i>LENORE</i></p>
						</div>
					</div>
					<div class="parent-test-item">
						<div class="col-sm-3">
							<div class="parent-img">
								<img src="assets/img/parent/parent2.jpg" alt="parent"/>
							</div>
						</div>
						<div class="col-sm-9">
							<p class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></p>
							<p><i>"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout".</i></p>
							<p class="parent-details"><i>JOHN DOE</i></p>
						</div>
					</div>
					<div class="parent-test-item">
						<div class="col-sm-3">
							<div class="parent-img">
								<img src="assets/img/parent/parent1.jpg" alt="parent"/>
							</div>
						</div>
						<div class="col-sm-9">
							<p class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
							<p><i>"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."</i></p>
							<p class="parent-details"><i>LENORE</i></p>
						</div>
					</div>
					<div class="parent-test-item">
						<div class="col-sm-3">
							<div class="parent-img">
								<img src="assets/img/parent/parent2.jpg" alt="parent"/>
							</div>
						</div>
						<div class="col-sm-9">
							<p class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></p>
							<p><i>"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout".</i></p>
							<p class="parent-details"><i>JOHN DOE</i></p>
						</div>
					</div>
					<div class="parent-test-item">
						<div class="col-sm-3">
							<div class="parent-img">
								<img src="assets/img/parent/parent1.jpg" alt="parent"/>
							</div>
						</div>
						<div class="col-sm-9">
							<p class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
							<p><i>"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."</i></p>
							<p class="parent-details"><i>LENORE</i></p>
						</div>
					</div>
					<div class="parent-test-item">
						<div class="col-sm-3">
							<div class="parent-img">
								<img src="assets/img/parent/parent2.jpg" alt="parent"/>
							</div>
						</div>
						<div class="col-sm-9">
							<p class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></p>
							<p><i>"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout".</i></p>
							<p class="parent-details"><i>JOHN DOE</i></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Facts section -->
        <div class="row section-row">
            <div class="container">
				<div class="fact-wrapper">
					<div class="col-md-5 fact-item">
						<p class="lg-icon"><i class="fa fa-trophy"></i></p>
						<p>PATHSHALA won best School award in 2016</p>
						<h1>WINNER BEST SCHOOL AWARD</h1>
						<p>It is a long established fact that a reader will be distracted by the content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the content.</p>
					</div>
					<div class="col-md-7 fact-item">
						<div class="fact-item-list">
							<div class="col-xs-3">
								<i class="fa fa-star"></i>
							</div>
							<div class="col-xs-9">
								<h2>14+ <br />COMPETITION WON</h2>
								<p>It is a long established fact that a reader will be distracted.</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="fact-item-list">
							<div class="col-xs-3">
								<i class="fa fa-clock-o"></i>
							</div>
							<div class="col-xs-9">
								<h2>1000+ <br />VOLUNTEER HOURS</h2>
								<p>It is a long established fact that a reader will be distracted.</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="fact-item-list">
							<div class="col-xs-3">
								<i class="fa fa-graduation-cap"></i>
							</div>
							<div class="col-xs-9">
								<h2>100% <br />SUCCESS RATE</h2>
								<p>It is a long established fact that a reader will be distracted.</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
        </div>
	
		<!-- Know More Info & Admission apply row -->
		<div class="row apply-know-row">
			<div class="container">
				<div class="col-sm-6 admission-row">
					<h3>ADMISSIONS ARE OPEN</h3>
					<p>It is a long established fact that a reader will be distracted by the content of a page when looking at its layout.</p>
					<a href="#"><i class="fa fa-edit"></i>APPLY NOW</a>
				</div>
				<div class="col-sm-6 info-row">
					<h3>HAVE ANY QUERIES?</h3>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					<div class="input-wrapper">
						<input type="text" placeholder="e.g. email@pathshala.com"/><a href="#"><i class="fa fa-paper-plane"></i></a>
					</div>
				</div>
			</div>
		</div>
		
        @endsection