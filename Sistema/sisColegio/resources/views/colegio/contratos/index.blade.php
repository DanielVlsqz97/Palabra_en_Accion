@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Contratos <a href="contratos/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('colegio.contratos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Estudiante</th>
					<th>Opciones</th>
				</thead>

				@foreach($contratos as $con)
					<tr>
						<td>{{$con->nombre.' '.$con->apellido}}</td>
						<td>

							<a href="{{URL::action('ContratosController@show',$con->idContrato)}}">
							<button class="btn btn-primary">Detalles</button>
						</a>

							<a href="" data-target="#modal-delete-{{$con->idContrato}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('colegio.contratos.modal')
				@endforeach
			</table>
		</div>
		{{$contratos->render()}}
	</div>
</div>
@endsection
