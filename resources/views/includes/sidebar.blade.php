<div class="sidebar_menu">
    <div class="menu-inner">
        <div id="sidebar-menu">
            <ul class="metismenu" id="sidebar_menu">
                <!-- Home -->
                @if (Auth::user()->hasPermission('Home'))
                <li> <a href="{{ route('home') }}">
                        <i class="feather ft-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                @endif
                <!-- Content -->
                <li>
                    <a href="javascript:;">
                        <i class="feather ft-mail"></i>
                        <span>Content</span>
                        <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="javascript:;">
                                <i class="ion-ios-folder-outline"></i>
                                <span>Setting</span>
                                <span class="float-right arrow">
                                    <i class="ion ion-chevron-down"></i>
                                </span>

                            </a>
                            <ul>
                                @if (Auth::user()->hasPermission('Grade'))
                                <li><a href="{{route('grades.index')}}">
                                        <i class="ion-ios-folder-outline"></i>
                                        <span>Grade</span>
                                    </a>
                                </li>
                                @endif
                                @if (Auth::user()->hasPermission('Subject'))
                                <li>
                                    <a href="{{route('subjects.index')}}">
                                        <i class="ti-pencil-alt"></i>
                                        <span>Subject</span>
                                    </a>
                                </li>
                                @endif
                                @if (Auth::user()->hasPermission('Course'))
                                <li>
                                    <a href="{{ route('courses.index') }}">
                                        <i class="ti-pencil-alt"></i>
                                        <span>Course</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('lessons.create') }}">
                                <i class="ti-pencil-alt"></i>
                                <span>Lesson Upload</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Lesson -->
                @if (Auth::user()->hasPermission('Lesson'))
                <li> <a href="{{ route('lessons.index') }}">
                        <i class="feather ft-home"></i>
                        <span>Lesson List</span>
                    </a>
                </li>
                @endif
                <!-- Store -->
                @if (Auth::user()->hasPermission('Store'))
                <li> <a href="javascript:;">
                        <i class="feather ft-home"></i>
                        <span>Store</span>
                        <span class="float-right arrow">
                            <i class="ion ion-chevron-down"></i>
                        </span>
                    </a>

                    <ul>
                        @if (Auth::user()->hasPermission('Course'))
                        <li> <a href="{{ route('courses.products') }}">
                                <i class="feather ft-home"></i>
                                <span>Product Management</span>
                            </a></li>
                        @endif
                        <li> <a href="/store/subscriptions">
                                <i class="feather ft-home"></i>
                                <span>Subscription Management</span>
                            </a></li>
                    </ul>
                </li>
                @endif
                <!-- Class -->
                @if (Auth::user()->hasPermission('Class'))
                <li> <a href="{{ route('classes.index') }}">
                        <i class="feather ft-home"></i>
                        <span>Class</span>
                    </a>
                </li>
                @endif
                <!-- Themes -->
                @if (Auth::user()->hasPermission('Themes'))
                <li> <a href="{{ route('videos.video-advertisement') }}">
                        <i class="feather ft-home"></i>
                        <span>Video Advertisement</span>
                    </a>
                </li>
                <li> <a href="javascript:;">
                        <i class="feather ft-home"></i>
                        <span>Themes</span>
                        <span class="float-right arrow">
                            <i class="ion ion-chevron-down"></i>
                        </span>
                    </a>
                    <ul>
                        <li> <a href="{{ route('themes.homepage-banner') }}">
                                <i class="feather ft-home"></i>
                                <span>Homepage Banner</span>
                            </a></li>
                        <li> <a href="{{ route('themes.homepage-sections') }}">
                                <i class="feather ft-home"></i>
                                <span>Homepage Sections</span>
                            </a></li>
                        <li> <a href="{{route('banners.index')}}">
                                <i class="feather ft-home"></i>
                                <span>Settings</span>
                            </a></li>
                    </ul>
                </li>
                @endif
                <!-- Report -->
                @if (Auth::user()->hasPermission('Report'))
                <li> <a href="javascript:;">
                        <i class="feather ft-home"></i>
                        <span>Report</span>
                        <span class="float-right arrow">
                            <i class="ion ion-chevron-down"></i>
                        </span>
                    </a>
                    <ul>
                        <li> <a href="{{ route('report.users') }}">
                                <i class="feather ft-home"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li> <a href="{{ route('report.sales') }}">
                                <i class="feather ft-home"></i>
                                <span>Sale</span>
                            </a>
                        </li>
                        <li> <a href="{{ route('report.contents') }}">
                                <i class="feather ft-home"></i>
                                <span>Content</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- User -->
                @if (Auth::user()->hasPermission('User'))
                <li> <a href="javascript:;">
                        <i class="feather ft-home"></i>
                        <span>Account Management</span>
                        <span class="float-right arrow">
                            <i class="ion ion-chevron-down"></i>
                        </span>
                    </a>
                    <ul>
                        <li> <a href="{{ route('account.index') }}">
                                <i class="feather ft-home"></i>
                                <span>Account Management</span>
                            </a></li>
                        <li> <a href="{{route('users.plans')}}">
                                <i class="feather ft-home"></i>
                                <span>Plan</span>
                            </a></li>
                        <li> <a href="{{ route('userbank.index')}}">
                                <i class="feather ft-home"></i>
                                <span>Billing</span>
                            </a></li>
                        <li> <a href="{{route('users.index')}}">
                                <i class="feather ft-home"></i>
                                <span>Admin</span>
                            </a></li>
                        <!-- Group -->
                        @if (Auth::user()->hasPermission('Group'))
                        <li> <a href="{{route('groups.index')}}">
                                <i class="feather ft-home"></i>
                                <span>Group</span>
                            </a></li>
                        @endif
                    </ul>
                </li>
                @endif
                <!-- Setting -->
                @if (Auth::user()->hasPermission('Setting'))
                <li>
                    <a href="{{ route('settings.index') }}">
                        <i class="feather ft-home"></i>
                        <span>Setting</span>
                        <span class="float-right arrow">
                            <i class="ion ion-chevron-down"></i>
                        </span>
                    </a>
                    <ul>
                        <li> <a href="{{ route('settings.logo') }}">
                                <i class="feather ft-home"></i>
                                <span>Logo</span>
                            </a>
                        </li>
                        <li> <a href="{{ route('pages.index') }}">
                                <i class="feather ft-home"></i>
                                <span>Pages</span>
                            </a>
                        </li>
                        <li> <a href="{{ route('settings.popup') }}">
                                <i class="feather ft-home"></i>
                                <span>Popup</span>
                            </a>
                        </li>
                        <li> <a href="{{ route('settings.notice') }}">
                                <i class="feather ft-home"></i>
                                <span>Notice</span>
                            </a>
                        </li>
                        <li> <a href="{{ route('settings.customer-inquiry') }}">
                                <i class="feather ft-home"></i>
                                <span>Customer Inquiry</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>