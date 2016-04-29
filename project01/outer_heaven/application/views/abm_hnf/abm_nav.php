<nav class="navbar-inverse" role="navigation">
	
	<div class="navbar-header">
		<a class="navbar-brand" href="<?=base_url()?>index"><img class="logo" src="<?=base_url()?>css/img/mini-logo.png"></a>
	</div>
	
	<div class="collapse navbar-collapse navbar-ex1-collapse">
	
		<ul class='nav navbar-nav'>
			<li><a href="<?=base_url()?>index">Inicio</a></li>
			<li><a href="<?=base_url()?>abm/instrumentos">Instrumentos</a></li>
			<li><a href="#">Usuarios</a></li>
			<li><a href="#">Esto es para rellenar</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown a futuro (ni idea todavia jaja)<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li><a href="#">Separated link</a></li>
					<li class="divider"></li>
					<li><a href="#">One more separated link</a></li>
				</ul>
			</li>
		</ul>
		
		<ul class="nav navbar-nav navbar-right"> 
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Buscar contenido...">
				</div>
				<button type="submit" class="btn btn-default">Buscar</button>
			</form>
		</ul>
											
	</div>

</nav>
