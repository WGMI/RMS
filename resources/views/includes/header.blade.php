<header>
				<!-- navigation -->
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><img class="img-responsive" src="img/stc.png" alt="Logo" /></a>
				<!--<a class="navbar-brand" href="/"><h2>Strathmore Cafeteria</h2></a>-->
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/menu">Today's Menu</a></li>
					<li>
						<a href="/cart">
							Cart 
							@if(Cart::instance('default')->count())
								<span class="badge badge-warning">{{Cart::instance('default')->count()}}</span>
							@endif								
						</a>
					</li>
					<li><a href="/checkout">Checkout</a></li>
					@guest
						<li>
							<a href="login">Login/Register</a> 
						</li>
					@else
						<li>
							<a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form> 
						</li>
						<!--
						<li>
							<a href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;{{auth()->user()->name}}</a>
						</li>
						-->
					@endguest
					<!--
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#event">Events</a></li>
							<li><a href="#blog">New Blogs</a></li>
							<li><a href="#subscribe">Subscribe</a></li>
							<li><a href="#team">Executive Team</a></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>-->
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</header>