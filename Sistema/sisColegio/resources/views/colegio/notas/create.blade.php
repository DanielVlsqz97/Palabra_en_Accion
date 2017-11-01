@extends('layouts.admin')
@section('contenido')

	<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("primer_reporte");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

		function showContent1() {
        element = document.getElementById("content1");
        check = document.getElementById("segundo_reporte");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

		function showContent2() {
        element = document.getElementById("content2");
        check = document.getElementById("tercer_reporte");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

		function showContent3() {
        element = document.getElementById("content3");
        check = document.getElementById("primera_llamadaAnt");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

		function showContent4() {
        element = document.getElementById("content4");
        check = document.getElementById("segunda_llamadaAnt");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

		function showContent5() {
        element = document.getElementById("content5");
        check = document.getElementById("tercera_llamadaAnt");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

	</script>



	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Nota</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'colegio/notas','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="Estudiante_idEstudiante">Estudiante</label>
						<select data-live-search="true" name="Estudiante_idEstudiante" id="Estudiante_idEstudiante" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($estudiantes as $est)
								<option value="{{$est->idEstudiante}}">{{$est->nombre.' '.$est->apellido}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="Curso_idCurso">Curso </label>
						<select data-live-search="true" name="Curso_idCurso" id="Curso_idCurso" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($cursos as $cur)
								<option value="{{$cur->idCurso}}">{{$cur->nombre_curso}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="Bimestre_idBimestre">Bimestre </label>
						<select data-live-search="true" name="Bimestre_idBimestre" id="Bimestre_idBimestre" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($bimestres as $bim)
								<option value="{{$bim->idBimestre}}">{{$bim->nombre_bimestre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="actitudinal">Actitudinal</label>
						<input type="number" name="actitudinal"  min="0" max="3" step="0.01" value="{{old('actitudinal')}}" class="form-control" placeholder="Actitudinal...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Prosidemental">Prosidemental</label>
						<input type="number" name="Prosidemental"  min="0" max="15" step="0.01"value="{{old('Prosidemental')}}" class="form-control" placeholder="Prosidemental...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="declarativo">Declarativo</label>
						<input type="number" name="declarativo"  min="0" max="12" step="0.01"value="{{old('declarativo')}}" class="form-control" placeholder="Declarativo...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="total">Total</label>
						<input type="number" name="total"  min="0" max="30" step="0.01"value="{{old('total')}}" class="form-control" placeholder="Total...">
					</div>
				</div>
			</div>


				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
