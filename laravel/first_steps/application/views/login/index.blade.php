@layout('layouts.master')
@include('partials.header')
@include('partials.footer')

@yield('header')
<?php $status = Session::get('status'); ?>

<!-- check for login errors flash var -->
@if (Session::has('login_errors'))
    <span class="error">Username or password incorrect.</span>
@endif

	<p id="message">
		{{ $data['message'] }}
		@if ( $status )
			{{ $status }}
		@endif
	</p>
	<section id="body">
		<div id="progress-bar"></div><!-- #progress-bar -->
		<div id="stats"></div><!-- #stats -->
		<div id="controls">
			{{ Form::open('/', 'POST', array('id' => 'login')) }}
					{{ Form::text('username', null, array('placeholder' => 'username')) }}
					{{ Form::password('password', array('placeholder' => 'Password')) }}
					{{ Form::submit('login') }}
			{{ Form::close() }}
		</div><!-- #controls -->
		<p id="utility-links"><a href="/register">Register</a></p>
	</section><!-- #body -->
	
@yield('footer')