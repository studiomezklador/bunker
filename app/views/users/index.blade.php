@extends('layouts.dashboard')

@section('content')

	<div class="row">
		@if ($users)
			<h1>Liste des les utilisateurs</h1>
			<table class="table table-stripped table-responsive">
				<thead>
					<tr>
						<th>id</th>
						<th>Pseudo / Login</th>
						<th>Email</th>
						<th>Suppression ?</th>
					</tr>
				</thead>
				<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td><a href="{{ URL::route('users.edit', $user->id) }}">{{ $user->username }}</a></td>
					<td>{{ $user->email }}</td>
					<td><a href="{{ URL::route('users.delete', $user->id) }}" class="btn btn-sm btn-danger">Supprimer</a></td>
				</tr>
			@endforeach
				</tbody>
			</table>
		@else
			<div class="alert alert-warning" role="alert">Aucun utilisateur enregistré.</div>
		@endif
	</div>

@stop