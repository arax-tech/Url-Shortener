<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <?php if (!empty(Auth::User()->image)): ?>
        <img src="{{ asset('back_end/uploads/users/'.Auth::User()->image)}}" class="avatar-sm rounded-circle mr-2" />
        <img src="{{ asset('back_end/uploads/users/'.Auth::User()->image)}}" class="avatar-xs rounded-circle mr-2" />
        <?php else: ?>
        <img src="{{ asset('back_end/assets/images/placeholder.png')}}" class="avatar-sm rounded-circle mr-2" />
        <img src="{{ asset('back_end/assets/images/placeholder.png')}}" class="avatar-xs rounded-circle mr-2" />
        <?php endif ?>

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{ Auth::User()->name }}</h6>
            <span class="pro-user-desc">Online</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="{{ url('/user/profile') }}" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>My Account</span>
                </a>

               
                <a href="{{ url('/user/password') }}" class="dropdown-item notify-item">
                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                    <span>Update Password</span>
                </a>

                <div class="dropdown-divider"></div>

                <a href="{{ url('/user/logout') }}" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ url('/user/dashboard') }}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="">
                    <a href="javascript: void(0);" aria-expanded="false" class="mm-collapsed">
                        <i data-feather="command"></i>
                        <span> Branded Links </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level mm-collapse" aria-expanded="false" style="">
                        <li>
                            <a href="{{ url('/user/create-links')}}">Create</a>
                        </li>
                        <li>
                            <a href="{{ url('/user/view-links')}}">View</a>
                        </li>
                    </ul>
                </li>


                <li class="">
                    <a href="javascript: void(0);" aria-expanded="false" class="mm-collapsed">
                        <i data-feather="command"></i>
                        <span> Free Links </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level mm-collapse" aria-expanded="false" style="">
                        <li>
                            <a href="{{ url('/user/create-free')}}">Create</a>
                        </li>
                        <li>
                            <a href="{{ url('/user/shortener-links')}}">View</a>
                        </li>
                    </ul>
                </li>



                <li class="">
                    <a href="javascript: void(0);" aria-expanded="false" class="mm-collapsed">
                        <i data-feather="command"></i>
                        <span> Tags </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level mm-collapse" aria-expanded="false" style="">
                        <li>
                            <a href="{{ url('/user/create-tag')}}">Create</a>
                        </li>
                        <li>
                            <a href="{{ url('/user/view-tag')}}">View</a>
                        </li>
                    </ul>
                </li>
                

               


                <li>
                    <a href="{{url('/user/password')}}">
                        <i data-feather="lock"></i>
                        <span> Password </span>
                    </a>
                </li>
             

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>