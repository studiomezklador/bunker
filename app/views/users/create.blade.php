@extends('layouts.dashboard')

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<h1 class="lead">Créer un nouveau Pseudo</h1>
		</div>

		<div class="col-lg-12">
			{{ Form::open([ 'url' => URL::route('users.store') ]) }}

				<div class="form-group">
					{{ Form::label("username", "Nouveau Pseudo") }}
					{{ Form::text("username", null, ['class' => 'form-control']) }}
				</div>

				<div class="form-group">
					{{ Form::label("email", "Adresse email") }}
					{{ Form::text("email", null, ['class' => 'form-control']) }}
				</div>

				<div class="form-group">
					{{ Form::label("password", "Mot de Passe") }}
					{{ Form::password("password", ['class' => 'form-control']) }}
				</div>

				<div class="col-lg-12">
					{{ Form::submit("Créer", ['class' => 'btn btn-info btn-lg']) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>

@stop