<!Doctype HTML>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="description" content="laravel app"/>
		<meta name="keywords" content="laravel"/>
		<title>Wax Man</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		{{ HTML::style('css/paper.css'); }}
		{{ HTML::script('js/angular.min.js'); }}
	</head>
	<body ng-app="">
		<header>
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            				<span class="icon-bar"></span>
            				<span class="icon-bar"></span>
            				<span class="icon-bar"></span>
          				</button>
          				
          				<a class="navbar-brand logo-barra-titulo" href="{{ url('/') }}">Wax Man</a>
          			</div>
          			<div class="collapse navbar-collapse navbar-right">
	                    <ul class="nav navbar-nav">
	                        <li><a href="{{ url('/rentas/create') }}">Agregar Renta</a></li>
	                        <li><a href="{{ url('/clientes/create') }}">Agregar Cliente</a></li>
	                        <li><a href="{{ url('/productos/create') }}">Agregar Producto</a></li>
	                    </ul>
                	</div>
				</div>
			</nav>
			<br>
			<br>
			<br>
		</header>
		<br>
		@yield('body')
		<footer>
		</footer>
		{{ HTML::script('js/jquery.min.js'); }}
		{{ HTML::script('js/bootstrap.min.js'); }}
	</body>
</html>