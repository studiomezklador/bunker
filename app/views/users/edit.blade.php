@extends('layouts.dashboard')

@section('content')

	<div class="row">
		@if (Session::has('msg'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				 <h4>AVERTISSEMENT !</h4>
				<p>{{ Session::get('msg') }}</p>
			</div>
		@endif
	</div>

	<div class="row">
		<h1 class="page-header">Édition de l'utilisateur</h1>
	</div>

	<div class="row">
		@if ($user)
			{{ Form::open([ 'url' => URL::route('users.update', $user->id) ]) }}
				<div class="form-group">
					{{ Form::label(null, "Pseudo") }}
					{{ Form::text("username", $user->username, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label(null, "Email") }}
					{{ Form::text("email", $user->email, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label(null, "Nouveau Mot de Passe") }}
					{{ Form::password("password", ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::submit("Modifier", ['class' => 'btn btn-default']) }}
					<a href="{{ URL::route('users.all') }}" class="btn btn-default">Retour</a>
				</div>
			{{ Form::close() }}
		@else
			<div class="alert alert-warning" role="alert">Aucun utilisateur sélectionné.</div>
		@endif
	</div>

@stop