@extends('layouts.dashboard')

@section('content')

	<div class="row">
		<h2><strong>Titre : </strong>{{ $post->title }}</h2>
		<p class="lead"><strong>Slug : </strong><em>{{ $post->slug }}</em></p>
	</div>

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Créé par {{ User::find($post->users_id)->username }}, le {{ $post->created_at }}
			</div>
			<div class="panel-body">
				<p>{{ $post->content }}</p>
				<hr />
				<p>Catégorie : {{ Category::find($post->categories_id)->title }}</p>

				@if ($post->publish)
					<p>En ligne</p>
				@else
					<p class="uppercase">Pas en ligne</p>
				@endif

			</div>
		</div>
		<a href="{{ route('posts.index') }}" class="btn btn-default">Liste</a>
		<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default">Editer</a>
	</div>

@stop