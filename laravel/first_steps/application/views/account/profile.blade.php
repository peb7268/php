@layout('layouts.master')
@include('partials.header')
@include('partials.footer')

@yield('header')

<p id="message">{{ $data['message'] }}</p>
<section id="body">
	<div id="progress-bar"></div><!-- #progress-bar -->
	<div id="stats"></div><!-- #stats -->
	<div id="profile">Profile</div>
</section><!-- #body -->
	
@yield('footer')

