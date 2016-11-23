@extends ('layouts.master')
@section ('body')
	<div class="container col-md-8 col-md-offset-2">
		<div class="jumbotron">
			<form method="POST" action="{{ url('/users/create') }}">
				<h1>Agregar Usuario</h1>
				<div class="form-group">
					<!--<label>Nombre</label>-->
					<input class="form-control" type="text" placeholder="Nombre" name="name" required>
				</div>
				<div class="form-group">
					<!--<label>Apellido</label>-->
					<input class="form-control" type="text" placeholder="Nombre de usuario" name="username" required>
				</div>
				<div class="form-group">
					<!--<label>Dirección</label>-->
					<input class="form-control" type="text" placeholder="Correo" name="email" required>
				</div>
				<div class="form-group">
					<!--<label>Colonia</label>-->
					<input class="form-control" type="password" placeholder="Contraseña" name="password" required>
				</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
@endsection