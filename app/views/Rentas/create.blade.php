@extends ('layouts.master')
@section ('body')
	<div class="container col-md-8 col-md-offset-2">
		<div class="jumbotron">
			<form method="POST" action="{{ url('/rentas/create') }}">
				<h1>Agregar Renta</h1>
				<br>
				<div class="form-group">
					<label>Cliente</label>
					<div class="row">
						<div class="col-md-9">
							<select class="form-control" name="cliente_id" required>
							@foreach ($clientes as $cliente)
								<option value="{{ $cliente ->id }}" >{{ $cliente ->nombres }} {{ $cliente ->apellidos }}</option>
							@endforeach
							</select>
						</div>
						<div class="col-md-3">
							<a href="{{ url('/clientes/create') }}" class="btn btn-primary btn-block">Nuevo Cliente</a>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Producto</label>
					<select class="form-control" name="producto_id" required>
						@foreach ($productos as $producto)
							@if (($producto ->cantidad)-($producto ->no_rentas) >= 1)
								<option value="{{ $producto ->id }}">{{ $producto ->nombre }}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input class="form-control" type="number" step="0.01" min="0" placeholder="Precio de renta" name="precio_renta" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="number" step="0.01" min="0" placeholder="Anticipo" name="anticipo" required>					
				</div>
				<div class="form-group col-md-6">
					<label>Fecha de entrega</label><br>
					{{ Form::input('date', 'fecha_entrega', false, array('class' => 'form-control', 'required' => 'required')) }}
				</div>
				<div class="form-group col-md-6">
					<label>Fecha de devolución</label><br>
					{{ Form::input('date', 'fecha_devolucion', false, array('class' => 'form-control', 'required' => 'required')) }}
				</div>
				<label>¿Firmo el pagare?</label><br>
				<select class="form-control" name="pagare_firmado" required>
					<option value="1">Si</option>
					<option value="0">No</option>
				</select>
				<br>
				<button type="submit" class="btn btn-primary">Agregar</button>
			</form>
		</div>
	</div>
@endsection