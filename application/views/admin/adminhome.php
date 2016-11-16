<div class="container map-container" ng-app="AdminApp" ng-controller="AdminController">
	<div class="row map-row">
		<div class="col-md-12" ng-show="listministeries">
			<div><h2>Ministerios</h2></div>
			<div>
				<ol>
					<li ng-click="edit(-1)">
						<a href="javascript:void(0)">
							<i class="glyphicon glyphicon-plus-sign"></i><strong> Nuevo </strong>
						</a>
					</li>
					<li ng-repeat="ministerio in ministerios" ng-click="edit($index)">
						<a href="javascript:void(0)">
							<i class="glyphicon glyphicon-map-marker"></i><strong> {{ministerio.title}} </strong>
						</a>
					</li>
				</ol>
			</div>
		</div>
		<div class="col-md-12" ng-show="newministeries">
			<form name="loginForm" id="loginForm">
				<div class="form-group">
					<label for="id_voluntaries">ID</label>
					<input type="text" class="form-control" id="id_voluntaries" name="id_voluntaries" placeholder="ID" ng-model="Formulario.id_voluntaries" readonly>
				</div>
				<div class="form-group">
					<label for="title">Título</label>
					<input type="title" class="form-control" id="title" name="title" placeholder="Título" ng-model="Formulario.title">
				</div>
				<div class="form-group">
				<label for="file">Imágen</label>
				<input id="file1" type="file" class="file" multiple=false data-preview-file-type="any">
				</div>
				
				<div class="form-group">
					<label for="info">Información</label>
					<textarea class="form-control" rows="3" placeholder="Textarea" name="info" id="info" ng-model="Formulario.info"></textarea>
				</div>
				<div class="form-group">
					<label for="contact">Contacto</label>
					<textarea class="form-control" rows="3" placeholder="Textarea" name="contact" id="contact" ng-model="Formulario.contact"></textarea>
				</div>
				<div class="form-group">
					<label for="voluntaries">Voluntariado</label>
					<textarea class="form-control" rows="3" placeholder="Textarea" name="voluntaries" id="voluntaries" ng-model="Formulario.voluntaries"></textarea>
				</div>
				<div class="form-group">
					<label for="lat">Latitud</label>
					<input type="lat" class="form-control" id="lat" name="lat" placeholder="Latitud" ng-model="Formulario.lat">
				</div>
				<div class="form-group">
					<label for="lng">Longitud</label>
					<input type="lng" class="form-control" id="lng" name="lng" placeholder="Longitud" ng-model="Formulario.lng">
				</div>
			</form>
			<button type="submit" class="btn btn-default" ng-click="Cancel()"><i class="glyphicon glyphicon-remove-sign"></i> Cancelar</button>
			<button type="submit" class="btn btn-primary" ng-click="Save()"><i class="glyphicon glyphicon-floppy-save"></i> Guardar</button>
		</div>
		<div class="col-md-12">
			<br><br><br><br><br><br>
		</div>
	</div> <!-- /container -->
</div>