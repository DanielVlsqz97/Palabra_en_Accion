@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Horarios <a href="horarios/create"><button class="btn btn-success">Nuevo</button></h3></a>
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
					<th>Dia</th>
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
						<td>{{$hor->dia}}</td>
						<td>{{$hor->hora_inicio}}</td>
						<td>{{$hor->hora_fin}}</td>
						<td>{{$hor->nombres.' '.$hor->apellidos}}</td>
						<td>{{$hor->nombre_grado}}</td>

						<td>
							<a href="{{URL::action('HorarioController@edit', $hor->idHorario)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="" data-target="#modal-delete-{{$hor->idHorario}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('colegio.horarios.modal')
				@endforeach
			</table>
		</div>
		{{$horarios->render()}}
	</div>
</div>
@endsection
