@section('header')
<div id="wrapper">
	<header>
		<a href="#" id="date">{{ $data['date'] }}</a>
		<ul id="account-controls">
			<li><span id="list-icon"><div class="list-row"></div><div class="list-row"></div><div class="list-row"></div></span><a href="#">@if( isset($data['name'])) {{ $data['name'] }} @endif</a></li>
			<li class="dropdown">
				<ul>
					<li><a href="profile">Profile</a></li>
					<li><a href="logout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</header>
@endsection