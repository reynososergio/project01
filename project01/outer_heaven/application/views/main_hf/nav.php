		
	
	<nav class="navbar-inverse" role="navigation">
	
		<div class="navbar-header">
			<a class="navbar-brand" href="<?=base_url()?>index"><img class="logo" src="<?=base_url()?>css/img/mini-logo.png"></a>
		</div>
	
		<div class="collapse navbar-collapse navbar-ex1-collapse">
	
			<ul class='nav navbar-nav'>
				<li><a href="<?=base_url()?>index">Inicio</a></li>
				<li><a href="<?=base_url()?>search/cat">Nuevo Proyecto</a></li>
				<li><a href="<?=base_url()?>index/contact">Graficar</a></li>
				<li><a href="<?=base_url()?>index/faqs">Manual</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Herramientas <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Analizar red</a></li>
						<li><a href="#">Monitorear paquetes</a></li>
						<li><a href="#">Configuracion</a></li>
						<li class="divider"></li>
						<li><a href="#"> Usar sockets</a></li>
						<li class="divider"></li>
						<li><a href="#"> </a></li>
					</ul>
				</li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right"> 
				
              	
              	<li class="dropdown">
					<button class="btn btn-primary dropdown-toggle botonesMargin" data-toggle="dropdown" id="botonIngreso" onclick="window.location='<?=base_url()?>index/singUp'">Registrarse</button>
				</li>
				
				<li class="dropdown">
					<button class="btn btn-primary dropdown-toggle botonesMargin" data-toggle="dropdown" id="botonIngreso">Ingresar</button>
					<ul class="dropdown-menu">
						<li>
							<form class="form-signin" role="form" id="menuIngreso" action="<?=base_url()?>index/signIn" method="post">
								<h2 class="form-signin-heading">Por favor, Ingrese su correo y contrase&ntilde;a</h2>
								<input type="text" name="username" class="form-control" placeholder="Nombre de Usuario" required autofocus>
								<input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" required>
								<label class="checkbox">
									<input type="checkbox" value="remember-me"> Recordarme
								</label>
								<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesion </button>
							</form>
						</li>
					</ul>
				</li>	
						
			</ul>
											
		</div>
	
	</nav>
