@extends('layout.app')

@section('content')
	<div class="container-fluid flex-grow-1">
		<div class="row justify-content-center align-items-center h-100 main-row">
			<div class="col-sm-8 col-md-7">
			<h1 class="display-1">Clique Soapbox</h1>
			<hr>
			<p class="lead">Please sign in. If you don't already have an account, please <a href="#">sign
			                                                                                         up</a>.
			</p>
			<form>
				<div class="form-floating mb-3">
					<input type="email" class="form-control" id="login_email" aria-describedby="emailHelp"
					       placeholder="Email Address">
					<label for="login_email" class="form-label">Email address</label>
					<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				</div>
				<div class="form-floating mb-3">
					<input type="password" class="form-control" id="login_password" placeholder="Password">
					<label for="login_password" class="form-label">Password</label>
				</div>
				<div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="remember_me">
					<label class="form-check-label" for="remember_me">Remember Me</label>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
			</div>
	</div>
@endsection
