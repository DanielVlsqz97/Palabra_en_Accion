@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Padres de Estudiantes<a href="padres/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('responsables.padres.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Padre</th>
					<th>Madre</th>
					<th>Estado Convivencia</th>
					<th>Opciones</th>
				</thead>

				@foreach($padres as $pad)
					<tr>
						<td>{{$pad->nombre_padre.'  '.$pad->apellido_padre}}</td>
						<td>{{$pad->nombre_madre.'  '.$pad->apellido_madre}}</td>
						<td>{{$pad->estado_convivencia}}</td>
						<td>
							<a href="{{URL::action('PadresController@edit',$pad->idPadres)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="" data-target="#modal-delete-{{$pad->idPadres}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('responsables.padres.modal')
				@endforeach
			</table>
		</div>
		{{$padres->render()}}
	</div>
</div>
@endsection
