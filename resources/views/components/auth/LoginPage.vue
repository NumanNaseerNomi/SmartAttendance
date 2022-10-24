<template>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-12 col-md-6 col-lg-4">
			<div class="card shadow">
				<div class="card-header text-center"><h5>Login</h5></div>
				<div class="card-body">
					<form @submit.prevent="login()">
						<div class="mb-3">
							<label class="form-label">Enter User Name</label>
                            <input class="form-control" v-model="authUser.userName" required />
						</div>
						<div class="mb-3">
							<label class="form-label">Enter Password</label>
                            <input class="form-control" type="password" v-model="authUser.password" required />
						</div>
                        <div class="mb-3">
							<div class="alert alert-danger" v-if="errors">
                                <ul class="mb-0"><li v-for="error in errors">{{ error }}</li></ul>
                            </div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-outline-primary">Login</button>
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
                    authUser: {},

                    // errors:
                    // {
                    //     userName:"numan.naseer.nomi",
                    //     password:"sdfsdasd fasdfasdf asdf a"
                    // },
                    errors: null,
                };
    
                return data;
            },
    
            methods:
            {
                

                login()
                {
                    let payload =
                    {
                        "email": this.authUser.userName, // eve.holt@reqres.in
                        "password": this.authUser.password, // "cityslicka"
                    };
    
                    let apiRequestDetails =
                    {
                        method: "POST",
                        body: JSON.stringify(payload),
                        headers: {"Content-type": "application/json; charset=UTF-8"},
                    };
    
                    fetch("https://reqres.in/api/login", apiRequestDetails)
                    .then((response) => response.json())
                    .then((json) => this.authUserInfo(json))
                    .catch((error) => console.warn(error));
                },

                authUserInfo(userInfo)
                {
                    this.authUser =
                    {
                        userName: this.authUser.userName,
                        apiToken: userInfo.token,
                    }
                    // // console.log(userInfo);

                    // let myObj = { name: 'Skip', breed: 'Labrador' };
                    localStorage.setItem("authUser", JSON.stringify(this.authUser));

                    this.errors = this.authUser;

                    // let item = JSON.parse(localStorage.getItem("authUser"));
                    // console.log(this.authUser);
                },

                
            },
        }
    </script>