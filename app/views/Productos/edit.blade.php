@extends ('layouts.master')
@section ('body')
	<div class="container col-md-8 col-md-offset-2">
		<div class="jumbotron">
			<form method="POST" action="{{ url('/libros/edit',$producto->id) }}"> 
				<h1>Editar Producto</h1>
				<br>
				<label>Nombre</label><br>
				<div class="form-group">
					<input value="{{$producto->nombre}}" class="form-control" type="text" placeholder="Nombre" name="nombre" required>
				</div>
				<div class="form-group">
					<label>Descripción</label><br>
					<textarea class="form-control"  placeholder="Descripción" name="descripcion">{{$producto->descripcion}}</textarea>
				</div>
				<div class="form-group">
					<label>Precio de compra</label><br>
					<input value="{{$producto->precio_compra}}" class="form-control" type="number" step="0.01" min="0" placeholder="Precio de Compra" name="precio_compra" required>
				</div>
				<div class="form-group">
					<label>Genero</label><br>
					<input value="{{$producto->genero}}" class="form-control" type="text" placeholder="Genero" name="genero">
				</div>
				<div class="form-group">
					<label>Autor</label><br>
					<input value="{{$producto->autor}}" class="form-control" type="text" placeholder="Autor" name="autor">
				</div>
				<div class="form-group">
					<label>Cantidad</label><br>
					<input value="{{$producto->cantidad}}" min="{{$producto->no_rentas}}" class="form-control" type="number" placeholder="Cantidad" name="cantidad">
				</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
@endsection