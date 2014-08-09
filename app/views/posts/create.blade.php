@extends('layouts.dashboard')

@section('content')
	{{ Form::open(['url' => URL::route('posts.insert', $admin->id)]) }}
	<div class="row">
		<div class="form-group">
			<h2><strong>Titre :</strong> {{ Form::text('title', "Titre de l'article ici...", ['class' => 'form-control']) }}</h2>

			<p class="lead"><strong>Slug : </strong><em>{{ Form::text('slug', null, ['class' => 'form-control']) }}</em></p>
		</div>
	</div>

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<p><em>Créé par <strong>{{ $admin->username }}</strong>, aujourd'hui.</em></p>
				{{ Form::select('category', $categories, null, ['class' => 'form-control']) }}
			</div>
			<div class="panel-body">
				<p>{{ Form::textarea('content', null, ['class' => 'form-control', 'rows' => '25']) }}</p>
			</div>
			{{ Form::submit('Créer', ['class' => 'btn btn-danger']) }}
			<button href="{{ route('posts.index') }}" type="button" class="btn btn-primary">Annuler</button>
		</div>
	</div>
	{{ Form::close() }}

@stop