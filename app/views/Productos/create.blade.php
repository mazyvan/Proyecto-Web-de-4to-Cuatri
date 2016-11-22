@extends ('layouts.master')
@section ('body')
	<div class="container col-md-8 col-md-offset-2">
		<div class="jumbotron">
			<form method="POST" action="{{ url('/libros/create') }}">
				<h1>Agregar Libro</h1>
				<br>
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Nombre" name="nombre" required>
				</div>
				<div class="form-group">
					<textarea class="form-control"  placeholder="Descripción" name="descripcion"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="number" step="0.01" min="0" placeholder="Precio de Compra" name="precio_compra" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Genero" name="genero">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Autor" name="autor">
				</div>
				<div class="form-group">
					<input class="form-control" type="number" min="0" placeholder="Cantidad" name="cantidad" required>
				</div>
				<button type="submit" class="btn btn-primary">Agregar</button>
			</form>
		</div>
	</div>
@endsection