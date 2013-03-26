@layout('layouts.master')

<!-- check for login errors flash var -->
@if (Session::has('login_errors'))
    <span class="error">Username or password incorrect.</span>
@endif

<div id="wrapper">
	<header><a href="#" id="date">{{ $data['date'] }}</a></header>
	<p id="message">{{ $data['message'] }}</p>
	@if (isset($data['creds']))
		@foreach($data['creds'] as $name => $cred)
			<p>{{ $name }}:  {{ $cred }}</p>
		@endforeach
	@endif
	<section id="body">
		<div id="progress-bar"></div><!-- #progress-bar -->
		<div id="stats"></div><!-- #stats -->
		<div id="controls">
			{{ Form::open('register', 'POST', array('id' => 'register')) }}
					{{ Form::text('name', null, array('placeholder' => 'Name')) }}
					{{ Form::text('username', null, array('placeholder' => 'email')) }}
					{{ Form::password('password', array('placeholder' => 'Password')) }}
					{{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password')) }}
					{{ Form::submit('register') }}
			{{ Form::close() }}
		</div><!-- #controls -->
	</section><!-- #body -->
	<footer>
		<ul class="clear"></ul>
	</footer>
</div><!-- #wrapper -->