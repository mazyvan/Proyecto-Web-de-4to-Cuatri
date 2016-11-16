@extends ('layouts.master')
@section ('body')
	<div class="container col-md-8 col-md-offset-2">
		<div class="jumbotron">
			<form method="POST" action="{{ url('/productos/edit',$producto->id) }}"> 
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
					<label>Color</label><br>
					<input value="{{$producto->color}}" class="form-control" type="text" placeholder="Color" name="color">
				</div>
				<div class="form-group">
					<label>Talla</label><br>
					<input value="{{$producto->talla}}" class="form-control" type="text" placeholder="Talla" name="talla">
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