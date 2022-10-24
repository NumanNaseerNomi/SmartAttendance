<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-header text-center"><h5>Change Password</h5></div>
                    <div class="card-body">
                        <form @submit.prevent="changePassword()">
                            <div class="mb-3">
                                <label class="form-label">Enter Old Password</label>
                                <input class="form-control" type="password" v-model="password.old" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Enter New Password</label>
                                <input class="form-control" type="password" v-model="password.new" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Renter New Password</label>
                                <input class="form-control" type="password" v-model="password.confirm" required />
                            </div>
                            <div class="mb-3">
                                <div class="alert alert-danger" v-if="errors">
                                    <ul class="mb-0"><li v-for="error in errors">{{ error }}</li></ul>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-primary">Save</button>
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
                        password: {},
                        errors: null,
                    };
        
                    return data;
                },
        
                methods:
                {
                    
    
                    changePassword()
                    {
                        let payload =
                        {
                            "email": "eve.holt@reqres.in",
                            "password": "cityslicka",
                        };
        
                        let apiRequestDetails =
                        {
                            method: "POST",
                            body: JSON.stringify(payload),
                            headers: {"Content-type": "application/json; charset=UTF-8"},
                        };
        
                        fetch("https://reqres.in/api/login", apiRequestDetails)
                        .then((response) => response.json())
                        .then((json) => this.handleResponse(json))
                        .catch((error) => console.warn(error));
                    },
    
                    handleResponse(userInfo)
                    {
                        // this.authUser =
                        // {
                        //     userName: this.authUser.userName,
                        //     apiToken: userInfo.token,
                        // }
                        // // console.log(userInfo);
    
                        // let myObj = { name: 'Skip', breed: 'Labrador' };
                        // localStorage.setItem("authUser", JSON.stringify(this.password));
    
                        this.errors = this.password;
    
                        // let item = JSON.parse(localStorage.getItem("authUser"));
                        // console.log(this.authUser);
                    },
    
                    
                },
            }
        </script>