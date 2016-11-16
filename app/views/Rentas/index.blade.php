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
				<input type="text" onkeypress="return runScript(event)" placeholder="Buscar En Renta" class="form-control" ng-model="search.renta">
				<script type="text/javascript">
				function runScript(e) {
				    if (e.keyCode == 13) {
				        document.getElementById('search-renta').click();
				        return false;
				    }
				}
				</script>
			</div>
			<div class="col-sm-3">
				<a id="search-renta" class="btn btn-info" href='{{ url("/") }}/@{{search.renta}}'>Buscar</a>
			</div>
		</div>
		<div class="col-sm-2">
			<br>
			<br>
			<div class="col-md-offset-3">
				<a href="{{ url('/rentas/create') }}" class="btn btn-success">Agregar Renta</a>
			</div>
		</div>
		</div>
		<div class="row">
		<div class="col-sm-2">
			<br>
			<div class="row">
				<a href="{{ url('/') }}" class="btn btn-primary btn-lg btn-block active">Rentas</a>
			</div><br>
			<div class="row">
				<a href="{{ url('/clientes') }}" class="btn btn-primary btn-lg btn-block">Clientes</a>
			</div><br>
			<div class="row">
				<a href="{{ url('/productos') }}" class="btn btn-primary btn-lg btn-block">Productos</a>
			</div><br>
			
		</div>
		<div class="col-sm-10">
			<br>
			<table class="table">
				<thead>
					<tr>
						<th>Cliente</th>
						<th>Producto</th>
						<th>Fecha de entrega</th>
						<th>Fecha de devolución</th>
						<th>Finalizada</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($rentas as $renta)
						<tr>
							<td>{{ $renta->cliente->nombres }}</td>
							<td>{{ $renta->producto->nombre }}</td>
							<td>{{ $renta->fecha_entrega }}</td>
							<td>{{ $renta->fecha_devolucion }}</td>
							<td>
								@if (($renta ->cerrada) === 1)
									<span class="glyphicon glyphicon-ok icon-success" aria-hidden="true"></span>
								@else
									<span class="glyphicon glyphicon-remove icon-danger" aria-hidden="true"></span>
								@endif
								<STYLE TYPE="text/css">
								.icon-success {
								    color: #4caf50;
								}
								.icon-danger{
									color: #e51c23;
								}
								</STYLE>
							</td>
							<td>
								@if (($renta ->cerrada) === 1)
									<a class="btn btn-m-bttm btn-info disabled btn-sm" href="">Finalizar</a>
								@else
									<button class="btn btn-m-bttm btn-info btn-sm" data-toggle="modal" data-target="#finalizar{{ $renta->id }}" href="">Finalizar</button>
									<div id="finalizar{{ $renta->id }}" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
								    	<div class="modal-dialog">
									      	<div class="modal-content">
									        	<div class="modal-header">
									          		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									          		<h4 class="modal-title" id="gridSystemModalLabel">Finalizar Renta No. {{ $renta ->id }}</h4>
									        	</div>
									        	<div class="modal-body">
									          		<div class="container-fluid">

									          			
		
			<form method="POST" action="{{ url('/',$renta->id) }}">
				<div class="form-group">
					@if(($renta->observaciones) === "")
						
					@else
						<label>Agregar una observación</label><br>
					@endif
					<textarea class="form-control"  placeholder="Agregar una observación" name="observaciones">{{$renta->observaciones}}</textarea>
				</div>
				<br>
				<button type="submit" class="btn btn-primary">Finalizar</button>
			</form>

									          		</div>
									        	</div>
									        	<div class="modal-footer">
									          		
									        	</div>
									      	</div><!-- /.modal-content -->
								    	</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
								@endif
								<button type="button" class="btn-m-bttm btn btn-primary btn-sm" data-toggle="modal" data-target="#{{ $renta->id }}" href="">Ver</button>
								<div id="{{ $renta->id }}" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
							    	<div class="modal-dialog">
								      	<div class="modal-content">
								        	<div class="modal-header">
								          		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								          		<h4 class="modal-title" id="gridSystemModalLabel">Renta No. {{ $renta ->id }}</h4>
								        	</div>
								        	<div class="modal-body">
								          		<div class="container-fluid">
								          			<p>Nombre del cliente: {{ $renta ->cliente->nombres }} {{ $renta ->cliente->apellidos }}</p>
								          			<p>Nombre del producto: {{ $renta->producto->nombre }}</p>
								          			<p>Observaciones: {{ $renta->observaciones }}</p>
								          			<p> Precio de Renta: {{ $renta-> precio_renta}}</p>
								          			<p> Anticipo: {{ $renta-> anticipo}}</p>
								          			<p> Saldo: {{ $renta-> saldo}}</p>
								          			<p> Fecha de entrega: {{ $renta->fecha_entrega }}</p>
								          			<p> Fecha de devolucion: {{ $renta->fecha_devolucion }}</p>
								          		</div>
								        	</div>
								        	<div class="modal-footer">
								          		<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
								        	</div>
								      	</div><!-- /.modal-content -->
							    	</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->

								<a class="btn btn-m-bttm btn-warning btn-sm" href="{{ url('/rentas/edit',$renta->id) }}">Editar</a>
								<a class="btn btn-m-bttm btn-danger btn-sm" href="{{ url('/rentas/destroy',$renta->id) }}">Eliminar</a>
								<style type="text/css">
									.btn-m-bttm{
										margin-bottom: 5px;
									}
								</style>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div></div>
	</div>
@endsection