<template>
    <TopNavbar></TopNavbar>
    <br/>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-4 mb-4">
			<SaveRecord></SaveRecord>
		</div>
		<div class="col-sm-12 col-md-8 mb-4">
			<div class="card text-center shadow">
				<div class="card-header"><h5>Manage Attendance {Card/Device}s</h5></div>
				<div class="container-fluid">
					<div class="card-body table-responsive">
						<table class="table table-bordered table-striped table-sm align-middle text-nowrap">
							<thead class="align-middle">
								<tr>
									<th scope="col">#</th>
									<th scope="col">NAME</th>
									<th scope="col">{Card/Device} ID</th>
									<th scope="col">DESCRIPTION</th>
									<th scope="col">STATUS</th>
									<th scope="col">MANAGE</th>
								</tr>
							</thead>
							<tbody>
								<!-- @foreach($result as $row)
									<tr id="editRow{{ $row->id }}">
										<td>{{ $row->id }}</td>
										<td>
											<div>{{ $row->name }}</div>
											<div class="text-muted">{{ $row->userName }}</div>
										</td>
										<td>{{ $row->cardId . $row->deviceId}}</td>
										<td>{{ $row->description }}</td>
										<td>
											@if($row->isBlocked)
												<span class="text-danger">Blocked</span>
											@else
												<span class="text-success">Active</span>
											@endif
										</td>
										<td>
											<button type="button" class="btn btn-outline-primary btn-sm" value="{{ $row->id }}" onClick="editable('#editRow{{ $row->id }}')">
												<i class="fas fa-edit"></i>
											</button>
										</td>
									</tr>
								@endforeach -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
    import TopNavbar from "./components/TopNavbar.vue";
    import SaveRecord from "./components/SaveRecord.vue";
    
    export default
    {
        components:
        {
            TopNavbar, SaveRecord
        }
    }
</script>