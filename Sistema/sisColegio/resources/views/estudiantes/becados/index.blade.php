@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Estudiantes Becados
		@include('estudiantes.becados.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Fecha de Nacimiento</th>
					<th>Edad</th>
					<th>Grado</th>
					<th>Padres de Familia</th>
					<th>Encargado</th>

				</thead>

				@foreach($becados as $bec)
					<tr>
						<td>{{$bec->nombre.'  '.$bec->apellido}}</td>
						<td>{{$bec->fecha_nac}}</td>
						<td>{{\Carbon\Carbon::parse($bec->fecha_nac)->age}}</td>
						<td>{{$bec->nombre_grado}}</td>
						<td>{{$bec->nombre_padre.' '.$bec->apellido_padre.' - '.$bec->nombre_madre.' '.$bec->apellido_madre}}</td>
						<td>{{$bec->nombre_encargado.' '.$bec->apellidos_encargado}}</td>

					</tr>

				@endforeach
			</table>
		</div>
		{{$becados->render()}}
	</div>
</div>
@endsection
