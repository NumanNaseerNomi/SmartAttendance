<header class="mb-5">
    <nav class="navbar fixed-top bg-light shadow py-1">
        <div class="container-fluid">
            <!-- NOMi - Side Navigation Bar - Start -->
            <div class="dropdown">
                @if(Session::get('user'))
                    <button class="btn btn-link text-dark py-0" title="Menu" type="button" id="menu" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-bars fs-4"></i></button>
                    <div class="dropdown-menu dropdown-menu-start shadow bg-light" aria-labelledby="menu">
                        <a class="dropdown-item text-dark my-2" href="{{url('/attendanceBook')}}">
                            <div class="row flex-nowrap">
                                <div class="col-2 text-center"><i class="fas fa-clipboard-user"></i></div>
                                <div class="col-10">Attendance Book</div>
                            </div>
                        </a>
                        @if(Session::get('user')->isAdmin)
                            <a class="dropdown-item text-dark my-2" href="{{url('/manageUsers')}}">
                                <div class="row flex-nowrap">
                                    <div class="col-2 text-center"><i class="fas fa-users"></i></div>
                                    <div class="col-10">Manage Users</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-dark my-2" href="{{url('/manageDevices')}}">
                                <div class="row flex-nowrap">
                                    <div class="col-2 text-center"><i class="fas fa-phone-laptop"></i></div>
                                    <div class="col-10">Manage Devices</div>
                                </div>
                            </a>
                        @endif
                        <hr class="dropdown-divider border-secondary"/>
                        <p class="small m-0 text-center text-dark">
                            <span>Powered by </span>
                            <a class="text-decoration-none text-dark" href="https://www.fb.com/numan.naseer.nomi" target="_blank">
                                <strong>NOMi</strong>
                            </a>
                        </p>
                    </div>
                @endif
            </div>
            <!-- NOMi - Side Navigation Bar - End -->
            <div>
                <a class="btn btn-link text-dark py-0 text-decoration-none" href="{{url('/')}}" type="button">
                    <b class="d-none d-sm-block fs-5">Attendance System</b>
                </a>
            </div>
            <div>
                <!-- NOMi - Profile Setting - Start -->
                <div class="btn-group">
                    <div class="dropdown">
                        @if(Session::get('user'))
                            <button class="btn btn-link text-dark py-0" title="My Profile" type="button" id="menuDropdownButton" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fs-4"></i></button>
                            <div class="dropdown-menu dropdown-menu-end shadow bg-light" aria-labelledby="menuDropdownButton">
                                <span class="dropdown-item text-dark my-2 text-center" title="My Profile">
                                    <div>{{Session::get('user')->name}}</div>
                                    <div class="small">{{Session::get('user')->userName}}</div>
                                </span>
                                <hr class="dropdown-divider border-secondary"/>
                                <a class="dropdown-item text-dark my-2" href="{{url('/settings')}}">
                                    <div class="row flex-nowrap">
                                        <div class="col-2 text-center"><i class="fas fa-cogs"></i></div>
                                        <div class="col-10">Settings</div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider border-secondary"/>
                                <a class="dropdown-item text-dark my-2" href="{{url('/logout')}}">
                                    <div class="row flex-nowrap">
                                        <div class="col-2 text-center"><i class="fas fa-power-off"></i></div>
                                        <div class="col-10">Logout</div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider border-secondary"/>
                                <p class="small m-0 text-center text-dark">
                                    <span>Powered by </span>
                                    <a class="text-decoration-none text-dark" href="https://www.fb.com/numan.naseer.nomi" target="_blank">
                                        <strong>NOMi</strong>
                                    </a>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- NOMi - Profile Setting - End -->
            </div>
        </div>
    </nav>
</header>