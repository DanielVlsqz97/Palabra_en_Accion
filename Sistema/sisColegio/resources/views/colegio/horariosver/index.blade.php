@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Horarios <a href="horariosver/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('colegio.horarios.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Curso</th>
					<th>SubArea</th>
					<th>Hora Inicio</th>
					<th>Hora Fin</th>
					<th>Docente</th>
					<th>Grado</th>
					<th>Opciones</th>
				</thead>

				@foreach($horarios as $hor)
					<tr>
						<td>{{$hor->nombre_curso}}</td>
						<td>{{$hor->nombre_subarea}}</td>
						<td>{{$hor->hora_inicio}}</td>
						<td>{{$hor->hora_fin}}</td>
						<td>{{$hor->nombres.' '.$hor->apellidos}}</td>
						<td>{{$hor->nombre_grado}}</td>


					</tr>
					
				@endforeach
			</table>
		</div>
		{{$horarios->render()}}
	</div>
</div>
@endsection
