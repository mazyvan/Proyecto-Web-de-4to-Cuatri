@extends ('layouts.master')
@section ('body')
	<div class="container col-md-8 col-md-offset-2">
		<div class="jumbotron">
			<form method="POST" action="{{ url('/rentas/edit',$renta->id) }}">
				<h1>Editar Renta</h1>
				<br>
				<div class="form-group col-md-6">
					<h5 class="">Cliente: {{ $renta->cliente->nombres }}</h5>
					
				</div>
				<div class="form-group col-md-6">
					<h5 class="">Producto: {{ $renta->producto->nombre }}</h5>
				</div>
				<div class="form-group">
					<label>Precio de renta</label><br>
					<input value="{{$renta-> precio_renta}}" class="form-control" type="number" step="0.01" min="0" placeholder="Precio de renta" name="precio_renta" required>
				</div>
				<div class="form-group">
					<label>Anticipo</label><br>
					<input value="{{$renta-> anticipo}}" class="form-control" type="number" step="0.01" min="0" placeholder="Anticipo" name="anticipo" required>					
				</div>
				<div class="form-group col-md-6">
					<label>Fecha de entrega</label><br>
					{{ Form::input('date', 'fecha_entrega', $renta->fecha_entrega, array('class' => 'form-control')) }}
				</div>
				<div class="form-group col-md-6">
					<label>Fecha de devolución</label><br>
					{{ Form::input('date', 'fecha_devolucion', $renta->fecha_devolucion, array('class' => 'form-control')) }}
				</div>
				<label>¿Firmo el pagare?</label><br>
				<select class="form-control" name="pagare_firmado" required>
					@if (($renta ->pagare_firmado) === 1)
						<option value="1">Si</option>
						<option value="0">No</option>
					@else
						<option value="0">No</option>
						<option value="1">Si</option>
					@endif
				</select>
				<div class="form-group">
					<br>
					@if(($renta->observaciones) === "")
						
					@else
						<label>Observaciones</label><br>
					@endif
					<textarea class="form-control"  placeholder="Observaciones" name="observaciones">{{$renta->observaciones}}</textarea>
				</div>
				<div class="form-group">
					<label>Renta finalizada</label><br>
					<select class="form-control" name="cerrada" required>
						@if (($renta ->cerrada) === 1)
							@if((($renta->producto->cantidad)-($renta->producto->no_rentas)) >= 1 )
								<option value="1">Si</option>
								<option value="0">No</option>
							@else
								<option value="1">Sí</option>
								<option value="1">No hay suficientes productos para reactivar esta renta</option>
							@endif
							
						@else
							<option value="0">No</option>
							<option value="1">Sí</option>
						@endif
					</select>
				</div>
				<br>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
@endsection