<template>
<div class="container">
	<div class="row justify-content-center">
		<!-- @if ($errors->any()) -->
			<div class="alert alert-danger">
				<ul>
					<!-- @foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach -->
				</ul>
			</div>
		<!-- @endif -->
		<div class="col-sm-12 col-md-6 col-lg-4">
			<div class="card shadow">
				<div class="card-header text-center"><h5>Login</h5></div>
				<div class="card-body">
					<form method="post" action="{{ url('/login') }}">
						<!-- @csrf -->
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
</template>
    
    <script>
        export default
        {
            data()
            {
                let data =
                {
                    type: "User/Device",
                    records:
                    [
                        {
                            id:545,
                            name:"Numan Naseer Nomi",
                            userName:"numan.naseer.nomi",
                            description:"sdf sd",
                            isActive:1,
                            productId: "sd5f4s"
                        },
                        {
                            id:545,
                            name:"Numan Naseer Nomi",
                            userName:"numan.naseer.nomi",
                            description:"sdf sd",
                            isActive:0,
                            productId: "sd5f4s"
                        }
                    ],
                    // records: {}
                };
    
                return data;
            },
    
            methods:
            {
                loadRecords()
                {
                    fetch('https://jsonplaceholder.typicode.com/todos')
                    .then(response => response.json())
                    .then(json => console.log(json));
                }
                // saveRecord()
                // {
                //     // console.log(this.record);
                //     this.record = {};
                //     // fetch('https://jsonplaceholder.typicode.com/todos/1')
                //     // .then(response => response.json())
                //     // .then(json => console.log(json))
    
                //     let payload =
                //     {
                //         title: "foo",
                //         body: "bar",
                //         userId: 1,
                //     };
    
                //     let apiRequestDetails =
                //     {
                //         method: "POST",
                //         body: JSON.stringify(payload),
                //         headers: {"Content-type": "application/json; charset=UTF-8"},
                //     };
    
                //     fetch("https://jsonplaceholder.typicode.com/posts", apiRequestDetails)
                //     .then((response) => response.json())
                //     .then((json) => console.log(json));
                // }
            },

            mounted()
            {
                this.loadRecords();
            }
        }
    </script>