<div class="container map-container" ng-app="AdminApp" ng-controller="LoginController">
	<div class="row map-row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form name="loginForm" id="loginForm">
				<div class="form-group">
					<label for="user">Usuario</label>
					<input type="text" class="form-control" id="user" name="user" placeholder="Usuario" ng-model="Formulario.user">
				</div>
				<div class="form-group">
					<label for="password">Contraseña</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" ng-model="Formulario.password">
				</div>
				
			</form>
			<button type="submit" class="btn btn-default" ng-click="Login()">Entrar</button>
		</div>
		<div class="col-md-4"></div>
	</div> <!-- /container -->
</div>