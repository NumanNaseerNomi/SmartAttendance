<template>
    <header class="mb-5">
        <nav class="navbar fixed-top shadow py-1 bg-light">
            <div class="container-fluid">
                <!-- NOMi - Side Navigation Bar - Start -->
                <div class="btn-group">
                    <div class="dropdown" v-if="authUser">
                        <button class="btn btn-link text-dark py-0" title="Menu" type="button" id="menu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bars fs-4"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-start shadow" aria-labelledby="menu">
                            <a class="dropdown-item my-2" href="/attendanceBook">
                                <div class="row flex-nowrap">
                                    <div class="col-2 text-center"><i class="fas fa-clipboard-check"></i></div>
                                    <div class="col-10">Attendance Book</div>
                                </div>
                            </a>
                            <template v-if="authUser.isAdmin">
                                <a class="dropdown-item my-2" href="/manageUsers">
                                    <div class="row flex-nowrap">
                                        <div class="col-2 text-center"><i class="fas fa-users"></i></div>
                                        <div class="col-10">Manage Users</div>
                                    </div>
                                </a>
                                <a class="dropdown-item my-2" href="/manageDevices">
                                    <div class="row flex-nowrap">
                                        <div class="col-2 text-center"><i class="fas fa-satellite"></i></div>
                                        <div class="col-10">Manage Devices</div>
                                    </div>
                                </a>
                            </template>
                            <hr class="dropdown-divider"/>
                            <p class="small m-0 text-center">
                                <span>Powered by </span>
                                <a class="text-decoration-none text-dark" href="https://www.fb.com/numan.naseer.nomi" target="_blank">
                                    <strong>NOMi</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- NOMi - Side Navigation Bar - End -->
                <div>
                    <a class="btn btn-link text-dark py-0 text-decoration-none" href="/" type="button">
                        <b class="d-none d-sm-block fs-5">Attendance System</b>
                    </a>
                </div>
                <div>
                    <!-- NOMi - Profile Setting - Start -->
                    <div class="btn-group">
                        <div class="dropdown" v-if="authUser">
                            <button class="btn btn-link text-dark py-0" title="My Profile" type="button" id="menuDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user fs-4"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="menuDropdownButton">
                                <span class="dropdown-item my-2 text-center" title="My Profile">
                                    <div>{{authUser.name}}</div>
                                    <div class="small">@{{authUser.userName}}</div>
                                </span>
                                <hr class="dropdown-divider"/>
                                <a class="dropdown-item my-2" href="/settings">
                                    <div class="row flex-nowrap">
                                        <div class="col-2 text-center"><i class="fas fa-cogs"></i></div>
                                        <div class="col-10">Settings</div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider"/>
                                <a class="dropdown-item my-2" href="/logout">
                                    <div class="row flex-nowrap">
                                        <div class="col-2 text-center"><i class="fas fa-power-off"></i></div>
                                        <div class="col-10">Logout</div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider"/>
                                <p class="small m-0 text-center">
                                    <span>Powered by </span>
                                    <a class="text-decoration-none text-dark" href="https://www.fb.com/numan.naseer.nomi" target="_blank">
                                        <strong>NOMi</strong>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- NOMi - Profile Setting - End -->
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
    export default
    {
        data()
        {
            let data =
            {
                authUser: {name:"Numan Naseer Nomi", userName:"numan.naseer.nomi", isAdmin:1},
                // authUser: null
            };

            return data;
        }
    }
</script>