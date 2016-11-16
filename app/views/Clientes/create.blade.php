@extends ('layouts.master')
@section ('body')
	<div class="container col-md-8 col-md-offset-2">
		<div class="jumbotron">
			<form method="POST" action="{{ url('/clientes/create') }}">
				<h1>Agregar Cliente</h1>
				<div class="form-group">
					<!--<label>Nombre</label>-->
					<input class="form-control" type="text" placeholder="Nombre" name="nombres" required>
				</div>
				<div class="form-group">
					<!--<label>Apellido</label>-->
					<input class="form-control" type="text" placeholder="Apellido" name="apellidos" required>
				</div>
				<div class="form-group">
					<!--<label>Dirección</label>-->
					<input class="form-control" type="text" placeholder="Calle y Número" name="direccion" required>
				</div>
				<div class="form-group">
					<!--<label>Colonia</label>-->
					<input class="form-control" type="text" placeholder="Colonia" name="colonia" required>
				</div>
				<div class="form-group">
					<!--<label>Telefono</label>-->
					<input class="form-control" type="number" placeholder="Telefono" name="telefono">
				</div>
				<div class="form-group">
					<!--<label>Celular</label>-->
					<input class="form-control" type="number" placeholder="Celular" name="celular">
				</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
@endsection