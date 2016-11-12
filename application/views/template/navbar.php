<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Volami</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse" ng-app="volamiApp" ng-controller="mapController">
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <label class="control-label" style="color: #fff;">Buscar Ministerios</label>

          <select class="form-control" onchange="getPos(this.value)">
            <option value="">Inicio</option>
            <option value="0">AMAZON LIFESAVERS MINISTRY (MANAUS, AMAZONAS – BRASIL)</option>
            <option value="1">ESCOLA DE PROFETAS (SAIRE, PERAMBUCO – BRASIL)</option>
            <option value="2">FUNDACION LA ALBORADA (SAN FRANCISCO, CUND. – COLOMBIA)</option>
            <option value="3">FUNDACION MANALSER (BUGA, VALLE)</option>
            <option value="4">FUNDACION NUEVO AMANECER (CUCUTA, N. DE SANTANDER – COLOMBIA)</option>
            <option value="5">FUNDACION EL SAUCE (SAMAIPATA – BOLIVIA)</option>
            <option value="6">FUNDACION VIDA SANA (FUSAGASUGÁ – COLOMBIA)</option>
          </select>
        </div>
      </form>
      
    </div><!--/.navbar-collapse -->
  </div>
</nav>