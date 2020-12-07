<!-- header area -->
    <style>
        .sidebar_btn span {font-size: 13px;letter-spacing: 1px;font-family: none;}  
    </style>
<header class="header_area">
    <!-- logo -->
    <div class="sidebar_logo">
        <a href="{{ route('admin.home') }}">
            <img src="{{asset('public/uploads/logos/'.$generalSettings->app_logo)}}" alt="" class="img-fluid logo1">
        </a>
    </div>
    <div class="sidebar_btn">
        <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
    </div>
    <div class="sidebar_btn">
        <span class="text-light"><b>Version 1.1</b> </span>
    </div>
    
    <ul class="header_menu">
    
        <li><a data-toggle="dropdown" href="#"><i class="far fa-envelope"></i><span>4</span></a>
            <div class="dropdown_wrapper messages_item dropdown-menu dropdown-menu-right">
                <div class="dropdown_header">
                    <p>you have 4 messages</p>
                </div>
                <ul class="dropdown_body nice_scroll scrollbar">
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <img src="{{asset('public/admins/images/user1.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="text-part">
                                <h6>Madelyn <span><i class="far fa-clock"></i> today</span></h6>
                                <p>Hello Sam...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <img src="{{asset('public/admins/images/user2.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="text-part">
                                <h6>Melvin <span><i class="far fa-clock"></i> today</span></h6>
                                <p>Hello jhon...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <img src="{{asset('public/admins/images/user3.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="text-part">
                                <h6>Olinda <span><i class="far fa-clock"></i> today</span></h6>
                                <p>Hello jhon...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <img src="{{asset('public/admins/images/user1.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="text-part">
                                <h6>Johnson <span><i class="far fa-clock"></i> today</span></h6>
                                <p>Hello Olinda...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <img src="{{asset('public/admins/images/user3.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="text-part">
                                <h6>Madelyn <span><i class="far fa-clock"></i> today</span></h6>
                                <p>Hello Sam...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <img src="{{asset('public/admins/images/user2.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="text-part">
                                <h6>Melvin <span><i class="far fa-clock"></i> today</span></h6>
                                <p>Hello jhon...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <img src="{{asset('public/admins/images/user3.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="text-part">
                                <h6>Olinda <span><i class="far fa-clock"></i> today</span></h6>
                                <p>Hello jhon...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <img src="{{asset('public/admins/images/user1.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="text-part">
                                <h6>Johnson <span><i class="far fa-clock"></i> today</span></h6>
                                <p>Hello Olinda...</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="dropdown_footer">
                    <a href="#">See All Messages</a>
                </div>
            </div>
        </li>
        <li><a href="#" data-toggle="dropdown"><i class="far fa-bell"></i><span>9</span></a>
            <div class="dropdown_wrapper notification_item dropdown-menu dropdown-menu-right">
                <div class="dropdown_header">
                    <p>You have 9 notifications</p>
                </div>
                <ul class="dropdown_body scrollbar nice_scroll">
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <span class="text-success"><i class="fas fa-users"></i></span>
                            </div>
                            <div class="text-part">
                                <p>5 new members joined</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i></span>
                            </div>
                            <div class="text-part">
                                <p> Very long description here that may...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <span class="text-success"><i class="fas fa-cart-plus"></i></span>
                            </div>
                            <div class="text-part">
                                <p> 25 sales made</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <span class="text-warning"><i class="fas fa-user"></i></span>
                            </div>
                            <div class="text-part">
                                <p> You changed your username</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <span class="text-success"><i class="fas fa-users"></i></span>
                            </div>
                            <div class="text-part">
                                <p>5 new members joined</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i></span>
                            </div>
                            <div class="text-part">
                                <p> Very long description here that may...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <span class="text-success"><i class="fas fa-cart-plus"></i></span>
                            </div>
                            <div class="text-part">
                                <p> 25 sales made</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-part">
                                <span class="text-warning"><i class="fas fa-user"></i></span>
                            </div>
                            <div class="text-part">
                                <p> You changed your username</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="dropdown_footer">
                    <a href="#">view All</a>
                </div>
            </div>
        </li>
        <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
            <div class="user_item dropdown-menu dropdown-menu-right">
                <div class="admin">
                    <a href="#" class="user_link"><img src="{{ asset('public/uploads/employee/'.Auth::user()->avater) }}" alt=""></a>
                </div>
                <ul>

                    <li><a href="{{ route('admin.user.profile.index') }}"><span><i class="fas fa-user"></i></span> User Profile</a></li>
                    @if(Auth::user()->role == 1)
                        <li><a href="{{ route('admin.settings.general.index') }}"><span><i class="fas fa-cogs"></i></span> Settings</a></li>
                    @endif
                    <li><a onclick="
                        event.preventDefault();
                        document.getElementById('logoutForm').submit();
                        " href="#"><span><i class="fas fa-unlock-alt"></i></span> Logout</a></li>
                </ul>
            </div>
        </li>
        <li><a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
    </ul>
</header><!-- / header area -->

<!--/ logout form -->
            <form style="display: none;" id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
<!--/ logout form end -->



