<div class="sidebar_menu">
    <div class="menu-inner">
        <div id="sidebar-menu">
            <ul class="metismenu" id="sidebar_menu">
                <li> <a href="/">
                        <i class="feather ft-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="/content">
                        <i class="feather ft-mail"></i>
                        <span>Content</span>
                        <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="/Setting">
                                <i class="ion-ios-folder-outline"></i>
                                <span>Setting</span>
                                <span class="float-right arrow">
                                    <i class="ion ion-chevron-down"></i>
                                </span>

                            </a>
                            <ul>
                                <li><a href="{{route('grades.index')}}">
                                        <i class="ion-ios-folder-outline"></i>
                                        <span>Grade</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('subjects.index')}}">
                                        <i class="ti-pencil-alt"></i>
                                        <span>Subject</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('courses.index') }}">
                                        <i class="ti-pencil-alt"></i>
                                        <span>Course</span>
                                    </a>
                                </li>
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
                <li> <a href="{{ route('lessons.index') }}">
                        <i class="feather ft-home"></i>
                        <span>Lesson List</span>
                    </a>
                </li>
                <li> <a href="/store">
                        <i class="feather ft-home"></i>
                        <span>Store</span>
                        <span class="float-right arrow">
                            <i class="ion ion-chevron-down"></i>
                        </span>
                    </a>

                    <ul>
                        <li> <a href="/stores">
                                <i class="feather ft-home"></i>
                                <span>Product Management</span>
                            </a></li>
                        <li> <a href="/store/subscriptions">
                                <i class="feather ft-home"></i>
                                <span>Subscription Management</span>
                            </a></li>
                    </ul>
                </li>
                <li> <a href="{{ route('classes.index') }}">
                        <i class="feather ft-home"></i>
                        <span>Class</span>
                    </a>
                </li>
                <li> <a href="/videos">
                        <i class="feather ft-home"></i>
                        <span>Video Advertisement</span>
                    </a>
                </li>
                <li> <a href="/themes">
                        <i class="feather ft-home"></i>
                        <span>Themes</span>
                        <span class="float-right arrow">
                            <i class="ion ion-chevron-down"></i>
                        </span>
                    </a>

                    <ul>
                        <li> <a href="/themes/banner">
                                <i class="feather ft-home"></i>
                                <span>Homepage Banner</span>
                            </a></li>
                        <li> <a href="/themes/sestion">
                                <i class="feather ft-home"></i>
                                <span>Homepage Sections</span>
                            </a></li>
                        <li> <a href="{{route('banners.index')}}">
                                <i class="feather ft-home"></i>
                                <span>Settings</span>
                            </a></li>
                    </ul>
                </li>
                <li> <a href="/Report">
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
                <li> <a href="/account">
                        <i class="feather ft-home"></i>
                        <span>Account Management</span>
                        <span class="float-right arrow">
                            <i class="ion ion-chevron-down"></i>
                        </span>
                    </a>
                    <ul>
                    <li> <a href="{{ route('account.index')}}">
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
                            <li> <a href="{{route('groups.index')}}">
                                <i class="feather ft-home"></i>
                                <span>Group</span>
                            </a></li>
                    </ul>
                </li>
                <li> <a href="/setting">
                        <i class="feather ft-home"></i>
                        <span>Setting</span>
                        <span class="float-right arrow">
                            <i class="ion ion-chevron-down"></i>
                        </span>
                    </a>
                    <ul>
                        <li> <a href="/setting/logo">
                                <i class="feather ft-home"></i>
                                <span>Logo</span>
                            </a>
                        </li>
                        <li> <a href="/pages">
                                <i class="feather ft-home"></i>
                                <span>Pages</span>
                                <span class="float-right arrow">
                                    <i class="ion ion-chevron-down"></i>
                                </span>
                            </a>
                            <ul>
                                <li> <a href="/setting/term">
                                        <i class="feather ft-home"></i>
                                        <span>Terms</span>
                                    </a>
                                </li>
                                <li> <a href="/setting/privacy-policy">
                                        <i class="feather ft-home"></i>
                                        <span>Privacy Policy</span>
                                    </a>
                                </li>
                                <li> <a href="/setting/refund-policy">
                                        <i class="feather ft-home"></i>
                                        <span>Refund Policy</span>
                                    </a>
                                </li>
                                <li> <a href="/setting/FAQ">
                                        <i class="feather ft-home"></i>
                                        <span>FAQ</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li> <a href="/setting/popup">
                                <i class="feather ft-home"></i>
                                <span>Popup</span>
                            </a>
                        </li>
                        <li> <a href="/setting/notice">
                                <i class="feather ft-home"></i>
                                <span>Notice</span>
                            </a>
                        </li>
                        <li> <a href="/setting/cusstomer">
                                <i class="feather ft-home"></i>
                                <span>Cusstomer Inquiry</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--=========================*
                          End Main Menu
                *===========================-->
        </div>
        <div class="clearfix"></div>
    </div>
</div>