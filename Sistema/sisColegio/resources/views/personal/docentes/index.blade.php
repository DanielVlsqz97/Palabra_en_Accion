@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Docentes<a href="docentes/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('personal.docentes.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Cedula Docente</th>
					<th>Inicio Labores</th>
					<th>Registro Escalafonario</th>
					<th>Opciones</th>
				</thead>

				@foreach($docentes as $doc)
					<tr>
						<td>{{$doc->nombres.' '.$doc->apellidos}}</td>
						<td>{{$doc->ceduladocente}}</td>
						<td>{{$doc->inicio_labores}}</td>
						<td>{{$doc->clase}}</td>
						<td>
							<a href="{{URL::action('DocentesController@edit', $doc->idDocente)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="" data-target="#modal-delete-{{$doc->idDocente}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('personal.docentes.modal')
				@endforeach
			</table>
		</div>
		{{$docentes->render()}}
	</div>
</div>
@endsection
