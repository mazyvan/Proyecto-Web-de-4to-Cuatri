@extends ('layouts.master')
@section ('body')
	<div class="container">
		<div class="row">
		<div class="col-sm-5">
			<h1>Sistema Trajes</h1>
		</div>
		<div class="col-sm-4">
			<br>
			<br>
			<div class="col-sm-9">
				<input type="text" onkeypress="return runScript(event)" placeholder="Buscar Producto" class="form-control" ng-model="search.producto">
				<script type="text/javascript">
				function runScript(e) {
				    if (e.keyCode == 13) {
				        document.getElementById('search-producto').click();
				        return false;
				    }
				}
				</script>
			</div>
			<div class="col-sm-3">
				<a id="search-producto" class="btn btn-info" href='{{ url("/productos") }}/@{{search.producto}}'>Buscar</a>
			</div>
		</div>
		<div class="col-sm-2">
			<br>
			<br>
			<div class="col-md-offset-3">
				<a href="{{ url('/productos/create') }}" class="btn btn-success">Agregar Producto</a>
			</div>
		</div>
		</div>
		<div class="row">
		<div class="col-sm-2">
			<br>
			<div class="row">
				<a href="{{ url('/') }}" class="btn btn-primary btn-lg btn-block">Rentas</a>
			</div><br>
			<div class="row">
				<a href="{{ url('/clientes') }}" class="btn btn-primary btn-lg btn-block">Clientes</a>
			</div><br>
			<div class="row">
				<a href="{{ url('/productos') }}" class="btn btn-primary btn-lg btn-block active">Productos</a>
			</div><br>
			
		</div>
		<div class="col-sm-10">
			<br>
			<table class="table">
				<thead>
					<tr>
					
						<th>Nombre</th>
						<th>Precio de Compra</th>
						<th>Color</th>
						<th>Talla</th>
						<th>Disponibles</th>
						<th>En renta</th>
						<th>Descripción</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($productos as $producto)
						<tr>
							<td>{{ $producto ->nombre }}</td>
							<td>$ {{ $producto ->precio_compra }}</td>
							<td>{{ $producto ->color }}</td>
							<td>{{ $producto ->talla }}</td>
							<td>{{ $producto ->cantidad - $producto ->no_rentas}}</td>
							<td>{{ $producto ->no_rentas }}</td>
							<td>
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{ $producto ->id }}" href="">Ver</button>
							</td>
							<div id="{{ $producto ->id }}" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
							    <div class="modal-dialog">
							      	<div class="modal-content">
							        	<div class="modal-header">
							          		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							          		<h4 class="modal-title" id="gridSystemModalLabel">{{ $producto ->nombre }}</h4>
							        	</div>
							        	<div class="modal-body">
							          		<div class="container-fluid">
							          			{{ $producto ->descripcion }}
							          		</div>
							        	</div>
							        	<div class="modal-footer">
							          		<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
							        	</div>
							      	</div><!-- /.modal-content -->
							    </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
							<td>
							<a class="btn btn-warning btn-sm"href="{{ url('/productos/edit',$producto->id) }}">Editar</a>
							<a class="btn btn-danger btn-sm" href="{{ url('/productos/destroy',$producto->id) }}">Eliminar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div></div>
	</div>
@endsection