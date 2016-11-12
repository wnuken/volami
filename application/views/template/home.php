<div class="container-fluid map-container">
	<div class="row map-row">
		<div id="map"></div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="modal-title">Título</h4>
					</div>
					<div class="modal-body">
						<div class="thumbnail">
							<img src="" alt="Image" id="modal-image">
						</div>
						<ul class="nav nav-tabs" id="myTabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
									<i class="glyphicon glyphicon-info-sign"></i>
									<span class="hidden-xs">Información</span>
								</a>
							</li>
							<li role="presentation" class="">
								<a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">
								<i class="glyphicon glyphicon-user"></i>
									<span class="hidden-xs">Contacto</span>
									</a>
							</li>
							<li role="presentation" class="">
								<a href="#other" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">
								<i class="glyphicon glyphicon-thumbs-up"></i>
									<span class="hidden-xs">Voluntariado</span>
								
								</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">
								<div id='modal-info'></div>
							</div>
							<div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profile-tab">
								<div id='modal-contact'></div>
							</div>
							<div class="tab-pane fade" role="tabpanel" id="other" aria-labelledby="dropdown1-tab">
								<div id='modal-voluntaries'></div>
							</div> 
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary">En el mapa</button>
					</div>
				</div>
			</div>
		</div> <!-- /myModal -->
	</div>
</div> <!-- /container -->