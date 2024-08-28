<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						
						<div class="row">
							<div class="col-xl-6">
								<div class="card">
									<div class="card-header border-0 pb-0 flex-wrap">
										<h3 class="mb-1">Parking Activity</h3>
										<div class="card-action coin-tabs mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#month" role="tab" aria-selected="false">Month</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#weekly" role="tab" aria-selected="true">Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#day" role="tab" aria-selected="false">Day</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body pb-2">
										<div class="d-flex align-items-center mb-5">
											<div class="d-flex align-items-center flex-lg-wrap me-5 flex-wrap">
												<span class="me-3 d-flex align-items-center">
													<svg class="me-2" width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect y="0.716797" width="12" height="12" rx="4" fill="var(--primary)"/>
													</svg>
													Check In
												</span>
												<h4 class="mb-0">457 cars</h4>
											</div>
											<div class="d-flex align-items-center flex-lg-wrap flex-wrap">
												<span class=" squre me-3 d-flex align-items-center">
													<svg class="me-2" width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect y="0.716797" width="12" height="12" rx="4" fill="#ff9d43"/>
													</svg>
													Check Out
												</span>
												<h4 class="mb-0">157 cars</h4>
											</div>
										</div>
										<div class="tab-content">
											<div class="tab-pane fade show active" id="month">
												<div id="reservationChart" class="reservationChart"></div>
											</div>	
											<div class="tab-pane fade" id="weekly">
												<div id="reservationChart1" class="reservationChart"></div>
											</div>	
											<div class="tab-pane fade" id="day">
												<div id="reservationChart2" class="reservationChart"></div>
											</div>	
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
								<div class="card availability line">
									<div class="card-header border-0">
										<h3>Employee Present</h3>	
									</div>
									<div class="card-body pb-2">
										<div id="pieChart1"></div>
										<div class="d-flex justify-content-between pt-3 pt-sm-5 flex-wrap">
											<span><span class="pills-lable bg-dark me-2"></span>Present</span>
											<h4>66 Employee</h4>
										</div>
										<div class="d-flex justify-content-between flex-wrap">
											<span><span class="pills-lable me-2"></span>Absent</span>
											<h4>129 Employee</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h3 class="mb-0">Visitor</h3>	
									</div>
									<div class="card-body pt-2 pb-2">
										<h2 class="text">12,456</h2>
										<div id="columnChart" class="crd-coloum"></div>
									</div>
								</div>
							</div>
						</div>
                        
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->