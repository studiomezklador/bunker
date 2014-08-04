@extends('layouts.log')

@section('content')
	<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1>[The BUNKER!]</h1>
					<div class="codrops-top">
						<a class="codrops-icon codrops-icon-info" href="#"><span>Full API to manage Portfolio & Blog section of Root Web Site.</span></a>
					</div>
				</div>
				{{ Form::open([
						'url' => 'foo/bar',
						'method' => 'POST',
						'autocomplet' => 'off',
						'class' => 'fs-form fs-form-full'
					]) }}
					<ol class="fs-fields">
						<li>
							{{ Form::label("q1", "User Name?", ['class' => 'fs-field-label fs-anim-upper']) }}
							{{ Form::text("q1", null, ['class' => 'fs-anim-lower', 'id' => 'q1', 'placeholder' => 'darthVador']) }}
						</li>
						<li>
							{{ Form::label("pwd", "Pass Word?", ['class'=> 'fs-field-label fs-anim-upper', 'id' => 'q2']) }}
							{{ Form::password("q2", ['class' => 'fs-anim-lower']) }}
						</li>
					</ol><!-- /fs-fields -->
					<button class="fs-submit" type="submit">Check</button>
				{{ Form::close() }}<!-- /fs-form -->
			</div><!-- /fs-form-wrap -->
@stop