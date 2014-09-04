@extends('layouts.dashboard')

@section('content')
	{{ Form::open(['url' => URL::route('posts.store', $post->id)]) }}
	<div class="row">
		<div class="form-group">
			<h2><strong>Titre :</strong> {{ Form::text('title', $post->title, ['class' => 'form-control']) }}</h2>

			<p class="lead"><strong>Slug : </strong><em>{{ Form::text('slug', $post->slug, ['class' => 'form-control']) }}</em></p>
		</div>
	</div>

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Créé par {{ User::find($post->users_id)->username }}, le {{ $post->created_at }} et modifié le {{ $post->updated_at }}
			</div>
			<div class="panel-body">
				<p>{{ Form::textarea('content', $post->content, ['class' => 'form-control', 'rows' => '25']) }}</p>
				<hr />

				<h5>Categorie</h5>
				{{ Form::select('category', $categories, $post->categories_id, ['class' => 'form-control']) }}

				@if ($post->publish)
					<p>En ligne</p>
				@else
					<p>Pas en ligne</p>
				@endif

			</div>
			{{ Form::submit('Modifier', ['class' => 'btn btn-danger']) }}
			<button href="{{ route('posts.index') }}" type="button" class="btn btn-primary">Annuler</button>
		</div>
	</div>
	{{ Form::close() }}

@stop