
@include("components/headerComponent")
@include("components/navbarViewComponent")
<br/>
<div class="container">
	<div class="row justify-content-center">
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="col-sm-12 col-md-6 col-lg-4">
			<div class="card shadow">
				<div class="card-header text-center"><h5>Login</h5></div>
				<div class="card-body">
					<form method="post" action="{{ url('/login') }}">
						@csrf
						<div class="mb-3">
							<label for="userName" class="form-label">Enter User Name</label>
							<input type="text" class="form-control" name="userName" required>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Enter Password</label>
							<input type="password" class="form-control" name="password" required>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary btn-sm">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@include("components/footerComponent")
