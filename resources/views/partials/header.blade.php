<header class="main-navigation">
	<nav class="navbar navbar-expand-lg navbar-light bg-light" title="Main Navigation" aria-label="Main Navigation">
		<div class="container-fluid">
			<button class="navbar-toggler col-auto order-1" type="button" aria-controls="navbarSupportedContent"
			        aria-expanded="false" aria-label="Toggle navigation" data-bs-toggle="collapse"
			        data-bs-target="#navbarSupportedContent">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand order-2 order-lg-1" href="/">Clique Soapbox</a>
			<div class="collapse navbar-collapse order-4 order-lg-2" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="/teams">Teams</a>
					</li>
				</ul>
			</div>
			<div class="d-flex col-auto profile-nav order-3 order-lg-3">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						   data-bs-toggle="dropdown" aria-expanded="false" aria-label="Profile Toggle">
                            <span class="profile-image">
                                <img src="{{ asset('images/placeholder-headshot-image.jpg') }}" alt="Placeholder Image"
                                     class="nav-image img-fluid img-thumbnail" height="50px" width="50px" />
                            </span>
							<span class="d-none d-lg-inline-block">Clique User</span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li class="d-lg-none">
								<a href="#" class="dropdown-item">
									Signed in as Clique User
								</a>
							</li>
							<li class="d-lg-none">
								<hr class="dropdown-divider">
							</li>
							<li>
								<a class="dropdown-item" href="/profile">Profile</a>
							</li>
							<li>
								<a class="dropdown-item" href="#">Sign Out</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
