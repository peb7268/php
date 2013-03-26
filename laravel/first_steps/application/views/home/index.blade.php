@layout('layouts.master')
@include('partials.header')
@include('partials.footer')

@yield('header')

	<p id="message">{{ $data['message'] }}</p>
	<section id="body">
		<div id="progress-bar"></div><!-- #progress-bar -->
		<div id="stats"></div><!-- #stats -->
		<div id="controls"><a href="#" id="start">Start Workout</a></div><!-- #controls -->
	</section><!-- #body -->

@yield('footer')