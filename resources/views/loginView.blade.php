<!DOCTYPE html>
<html lang="en">
	@include("components/headerComponent")
	<body class="bg-white text-dark">
		@include("components/navbarViewComponent")
		<br/>
		<div class="container">
			<div class="row justify-content-center">
				<!-- <div class="col"></div> -->
				<div class="col-sm-12 col-md-6 col-lg-4">
					<div class="card bg-light text-dark shadow">
						<div class="card-header text-center"><h5>Login</h5></div>
						<div class="card-body">
							<form>
								<div class="mb-3">
									<label for="userName" class="form-label">Enter User Name</label>
									<input type="text" class="form-control bg-white text-dark" id="userName" required>
								</div>
								<div class="mb-3">
									<label for="password" class="form-label">Enter Password</label>
									<input type="password" class="form-control bg-white text-dark" id="password" required>
								</div>
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary btn-sm">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- <div class="col"></div> -->
			</div>
		</div>
		<!-- NOMi - Bootstrap Bundle with Popper - Start -->
		<script src="plugins/bootstrap/bootstrap.bundle.min.js"></script>
		<!-- NOMi - Bootstrap Bundle with Popper - End -->
	</body>
</html>
