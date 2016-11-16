@extends ('layouts.master')
@section ('body')
	<div class="container col-md-8 col-md-offset-2">
		<div class="jumbotron">
			<form method="POST" action="{{ url('/productos/create') }}">
				<h1>Agregar Producto</h1>
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
					<input class="form-control" type="text" placeholder="Color" name="color">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Talla" name="talla">
				</div>
				<div class="form-group">
					<input class="form-control" type="number" min="0" placeholder="Cantidad" name="cantidad" required>
				</div>
				<button type="submit" class="btn btn-primary">Agregar</button>
			</form>
		</div>
	</div>
@endsection