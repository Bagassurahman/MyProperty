<section class="sticky-top" style="background: white;box-shadow:-1px 3px 6px rgb(0 0 0 / 12%);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navigation">
					<a class="navbar-brand" href="/">
						<img src="/images/logo-myproperty.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span><i class="fas fa-bars"></i></span>
                    </button>
					<div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mt-3 mx-auto">
                            <li class="nav-item ml-lg-4">
                                <a href="{{ route('home') }}" class="nav-link">Properties</a>
                            </li>
                            <li class="nav-item ml-lg-4">
                                <a href="{{ route('contact') }}" class="nav-link">Contacts</a>
                            </li>
                        </ul>
						<ul class="navbar-nav ml-auto mt-3">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i> Sign in</a>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a href="/admin/companies" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                        <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
