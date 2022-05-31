<!DOCTYPE html>
<html lang="en">
	@include("components/headerComponent")
	<body>
		@include("components/navbarViewComponent")
		<br/>
		<div class="container">
			<div class="row justify-content-center">
				<!-- <div class="col"></div> -->
				<div class="col-sm-12 col-md-6 col-lg-4">
					<div class="card shadow">
						<div class="card-header text-center"><h5>Change Pin Code</h5></div>
						<div class="card-body">
							<form method="post" action="{{ url('/passwordResetAuth') }}">
								@csrf
								<div class="mb-3">
									<label for="currentPinCode" class="form-label">Enter Current Pin Code</label>
									<input type="password" class="form-control" name="currentPinCode" id="currentPinCode" required>
								</div>
								<div class="mb-3">
									<label for="newPinCode" class="form-label">Enter New Pin Code</label>
									<input type="password" class="form-control" name="newPinCode" id="newPinCode" required>
								</div>
								<div class="mb-3">
									<label for="confirmPinCode" class="form-label">Confirm New Pin Code</label>
									<input type="password" class="form-control" name="confirmPinCode" id="confirmPinCode" required>
								</div>
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary btn-sm">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- <div class="col"></div> -->
			</div>
		</div>
		<!-- NOMi - Bootstrap Bundle with Popper - Start -->
		<!-- <script src="plugins/bootstrap/bootstrap.bundle.min.js"></script> -->
		<!-- NOMi - Bootstrap Bundle with Popper - End -->
	</body>
</html>
