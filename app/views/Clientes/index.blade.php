@extends ('layouts.master')
@section ('body')
	<div class="container">
		<div class="row">
		<div class="col-sm-5">
			<h1></h1>
		</div>
		<div class="col-sm-4">
			<br>
			<br>
			<div class="col-sm-9">
				<input type="text" onkeypress="return runScript(event)" placeholder="Buscar Cliente" class="form-control" ng-model="search.cliente">
				<script type="text/javascript">
				function runScript(e) {
				    if (e.keyCode == 13) {
				        document.getElementById('search-cliente').click();
				        return false;
				    }
				}
				</script>
			</div>
			<div class="col-sm-3">
				<a id="search-cliente" class="btn btn-info" href='{{ url("/clientes") }}/@{{search.cliente}}'>Buscar</a>
			</div>
		</div>
		<div class="col-sm-2">
			<br>
			<br>
			<div class="col-md-offset-3">
				<a href="{{ url('/clientes/create') }}" class="btn btn-success">Agregar Cliente</a>
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
				<a href="{{ url('/clientes') }}" class="btn btn-primary btn-lg btn-block active">Clientes</a>
			</div><br>
			<div class="row">
				<a href="{{ url('/libros') }}" class="btn btn-primary btn-lg btn-block">Libros</a>
			</div><br>
			
		</div>
		<div class="col-sm-10">
			<br>
			<table class="table">
				<thead>
					<tr>
						
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Calle y Número</th>
						<th>Colonia</th>
						<th>Telefono</th>
						<th>Celular</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($clientes as $cliente)
						<tr>
							
							<td>{{ $cliente ->nombres }}</td>
							<td>{{ $cliente ->apellidos }}</td>
							<td>{{ $cliente ->direccion }}</td>					
							<td>{{ $cliente ->colonia }}</td>
							<td>{{ $cliente ->telefono }}</td>
							<td>{{ $cliente ->celular }}</td>
							<td>
		<a class="btn btn-warning btn-sm" href="{{ url('/clientes/edit',$cliente->id) }}">Editar</a>
		<a class="btn btn-danger btn-sm" href="{{ url('/clientes/destroy',$cliente->id) }}">Eliminar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div></div>
	</div>
@endsection