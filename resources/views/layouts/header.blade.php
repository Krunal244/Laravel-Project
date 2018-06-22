<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@guest
				<li><a href="{{ route('login') }}">Login</a></li> @else
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-expanded="false"
					aria-haspopup="true"> Welcome {{ Auth::user()->name }} <span
						class="caret"></span>
				</a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('logout') }}"
							onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
								Logout </a>
							<form id="logout-form" action="{{ route('logout') }}"
								method="POST" style="display: none;">{{ csrf_field() }}</form></li>
					</ul></li> @endguest
			</ul>
		</nav>
	</div>
</div>