@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Registro Escalafonario<a href="registro_escalafonario/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('personal.registro_escalafonario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Clase</th>
					<th>Opciones</th>
				</thead>

				@foreach($registros as $reg)
					<tr>
						<td>{{$reg->clase}}</td>
						<td>
							<a href="{{URL::action('RegistroEscalafonarioController@edit', $reg->idRegistroEscalafonario)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="" data-target="#modal-delete-{{$reg->idRegistroEscalafonario}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('personal.registro_escalafonario.modal')
				@endforeach
			</table>
		</div>
		{{$registros->render()}}
	</div>
</div>
@endsection
