@extends('layouts.log')

@section('content')
	<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1>[The BUNKER!]</h1>
					<div class="codrops-top">
						<a class="codrops-icon codrops-icon-info" href="#"><span>Full API to manage Portfolio & Blog section of Root Web Site.</span></a>
					</div>
				</div>

					@if (Session::has('msg'))
						<div id="flash" class="modal fade">
							<h4>ALERT!</h4>
							<div class="modal-body">
								<p class="text-warning">{{ Session::get('msg') }}</p>
							</div>
						</div>
					@endif

				{{ Form::open([
						'route' => 'sessions.store',
						'autocomplet' => 'off',
						'class' => 'fs-form fs-form-full'
					]) }}
					<ol class="fs-fields">
						<li>
							{{ Form::label("username", "User Name?", ['class' => 'fs-field-label fs-anim-upper']) }}
							{{ Form::text("username", null, ['class' => 'fs-anim-lower', 'id' => 'q1', 'placeholder' => 'darthVador']) }}
						</li>
						<li>
							{{ Form::label("password", "Pass Word?", ['class'=> 'fs-field-label fs-anim-upper', 'id' => 'q2']) }}
							{{ Form::password("password", ['class' => 'fs-anim-lower']) }}
						</li>
					</ol><!-- /fs-fields -->
					{{ Form::button("Check", ['class' => 'fs-submit']) }}
				{{ Form::close() }}<!-- /fs-form -->
			</div><!-- /fs-form-wrap -->
@stop