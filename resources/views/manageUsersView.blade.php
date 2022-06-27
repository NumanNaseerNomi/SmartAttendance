@include("components/headerComponent")
@include("components/navbarViewComponent")
<br/>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-4 mb-4">
			<div class="card bg-light text-dark shadow">
				<div class="card-header text-center"><h5>Add New User</h5></div>
				<div class="card-body">
					<form method="post" action="{{ url('/saveUser') }}">
						@csrf
						<div class="mb-3">
							<label for="id" class="form-label">Serial Number</label>
							<input type="text" class="form-control form-control-sm" id="id" name="id" readonly required>
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control form-control-sm" id="name" name="name" required>
						</div>
						<div class="mb-3">
							<label for="cardId" class="form-label">Card ID</label>
							<input type="text" class="form-control form-control-sm" id="cardId" name="cardId" required>
						</div>
						<div class="mb-3">
							<label for="description" class="form-label">Description</label>
							<input type="text" class="form-control form-control-sm" id="description" name="description" required>
						</div>
						<div class="mb-3">
							<label for="status" class="form-label">Status</label>
							<select class="form-select form-select-sm" id="status" name="isBlocked" required>
								<option disabled selected></option>
								<option value="0">Active</option>
								<option value="1">Block</option>
							</select>
						</div>
						<div class="d-grid gap-2">
							<button type="reset" class="btn btn-outline-primary btn-sm">Reset</button>
							<button type="submit" class="btn btn-primary btn-sm">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-8 mb-4">
			<div class="card text-center shadow">
				<div class="card-header"><h5>Manage Attendance Users</h5></div>
				<div class="container-fluid">
					<div class="card-body table-responsive">
						<table class="table table-bordered table-striped table-sm align-middle text-nowrap">
							<thead class="align-middle">
								<tr>
									<th scope="col">#</th>
									<th scope="col">NAME</th>
									<th scope="col">CARD ID</th>
									<th scope="col">DESCRIPTION</th>
									<th scope="col">STATUS</th>
									<th scope="col">MANAGE</th>
								</tr>
							</thead>
							<tbody>
								@foreach($usersDetail as $user)
									<tr id="userRow{{ $user->id }}">
										<td>{{ $user->id }}</td>
										<td>
											<div>{{ $user->name }}</div>
											<div>({{ $user->userName }})</div>
										</td>
										<td>{{ $user->cardId }}</td>
										<td>{{ $user->description }}</td>
										<td>
											@if($user->isBlocked)
												<span class="text-danger">Blocked</span>
											@else
												<span class="text-success">Active</span>
											@endif
										</td>
										<td>
											@if(!$user->isAdmin)
												<button type="button" class="btn btn-outline-primary btn-sm" value="{{ $user->id }}" onClick="editUser('#userRow{{ $user->id }}')">
													<i class="fas fa-edit"></i>
												</button>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include("components/footerComponent")

<script>
	function editable(id)
	{
		let tableCell =  document.querySelector(id).querySelectorAll("td");

		document.querySelector("#id").value = parseInt(tableCell[0].innerHTML);
		document.querySelector("#name").value = tableCell[1].querySelector("div").innerHTML;
		document.querySelector("#cardId").value = tableCell[2].innerHTML;
		document.querySelector("#description").value = tableCell[3].innerHTML;
	}
</script>
