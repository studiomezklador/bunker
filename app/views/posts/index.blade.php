@extends('layouts.dashboard')

@section('content')

	<div class="row">
		@if ($posts)
			<h1>Liste des articles</h1>
			<table class="table table-stripped table-responsive">
				<thead>
					<tr>
						<th>id</th>
						<th>Titre</th>
						<th>Auteur</th>
						<th>Catégorie</th>
					</tr>
				</thead>
				<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td><a href="#">{{ $post->title }}</a></td>
					<td>{{ User::find($post->users_id)->first()->username }}</td>
					<td><a href="#">{{ $post->categories_id }}</a></td>
				</tr>
			@endforeach
				</tbody>
			</table>
		@else
			<div class="alert alert-warning" role="alert">Aucun article.</div>
		@endif
	</div>

@stop