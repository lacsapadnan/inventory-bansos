<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        {{ Request::segment(1) }}
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-toggle="dropdown">
                            <img src="{{ URL::asset('assets/images/ic_notif.svg') }}" width="18px" height="18px" alt="">
                            <div class="pulse-css"></div>
                        </a>
                        <div class="dropdown-menu rounded dropdown-menu-right">
                            <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
                                <ul class="timeline">
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media mr-2">
                                                <img alt="image" width="50" src="{{ URL::asset('assets/images/avatar/1.jpg') }}">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media mr-2 media-info">
                                                KG
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Resport created successfully</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media mr-2 media-success">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                        <li>
                                        <div class="timeline-panel">
                                            <div class="media mr-2">
                                                <img alt="image" width="50" src="assets/images/avatar/1.jpg">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media mr-2 media-danger">
                                                KG
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Resport created successfully</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media mr-2 media-primary">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <a class="all-notification" href="javascript:void(0)">See all notifications <i class="ti-arrow-right"></i></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                            <img src="{{ Auth::user()->profile_photo_url }}" width="20" alt=""/>
                            <div class="header-info">
                                <span class="text-black"><strong>{{ Auth::user()->name }}</strong></span>
                                <p class="fs-12 mb-0">{{ Auth::user()->roles }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('profile.show') }}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ml-2">Profile </span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ml-2">Logout </span>
                                </x-jet-dropdown-link>
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
