
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
				<div class="card-header text-center"><h5>Change Password</h5></div>
				<div class="card-body">
					<form method="post" action="{{ url('/passwordResetAuth') }}">
						@csrf
						<div class="mb-3">
							<label for="current_password" class="form-label">Enter Old Password</label>
							<input type="password" class="form-control" name="current_password" required>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Enter New Password</label>
							<input type="password" class="form-control" name="password" required>
						</div>
						<div class="mb-3">
							<label for="password_confirmation" class="form-label">Confirm New Password</label>
							<input type="password" class="form-control" name="password_confirmation" required>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary btn-sm">Set Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@include("components/footerComponent")
