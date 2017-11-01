@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Calificaciones<a href="notas/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('colegio.grados.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Estudiante</th>
					<th>Curso</th>
					<th>Bimestre</th>
					<th>Total</th>
					<th>Opciones</th>
				</thead>

				@foreach($calificaciones as $cal)
					<tr>
						<td>{{$cal->nombre.' '.$cal->apellido}}</td>
						<td>{{$cal->nombre_curso}}</td>
						<td>{{$cal->nombre_bimestre}}</td>
						<td>{{$cal->total}}</td>
						<td>
							<a href="{{URL::action('CalificacionesController@edit', $cal->idCalificacion)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="" data-target="#modal-delete-{{$cal->idCalificacion}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('colegio.notas.modal')
				@endforeach
			</table>
		</div>
		{{$calificaciones->render()}}
	</div>
</div>
@endsection
