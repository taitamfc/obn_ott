<style>
.setting-list {
    display: none;
}

.toggle-setting.active+.setting-list {
    display: block;
}
</style>

<div class="sidebar_menu">
    <div class="menu-inner">
        <div id="sidebar-menu">
            <ul class="metismenu" id="sidebar_menu">
                <!-- Home -->
                <!-- if (Auth::user()->hasPermission('Home')) -->
                <li> <a href="{{ route('admin.home') }}">
                        <i class="feather ft-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <!-- endif -->
                <li> <a href="{{ route('admin.questionanswer.index') }}">
                        <i class="feather ft-home"></i>
                        <span>Question</span>
                    </a>
                </li>
                <!-- Content -->
                <li>
                    <a href="javascript:;">
                        <i class="feather ft-home"></i>
                        <span>Content</span>
                        <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
                    </a>
                    <ul>
                        <a href="{{ route('admin.settings.show') }}" class="toggle-setting">
                            <span>Setting</span>
                            <span class="float-right arrow">
                                <i class="ion ion-chevron-down"></i>
                            </span>
                        </a>
                        <ul class="setting-list">
                            <!-- if (Auth::user()->hasPermission('Grade')) -->
                            <li><a href="{{route('admin.grades.index')}}">
                                    <i class="ion-ios-folder-outline"></i>
                                    <span>Grade</span>
                                </a>
                            </li>
                            <!-- endif -->
                            <!-- if (Auth::user()->hasPermission('Subject')) -->
                            <li>
                                <a href="{{route('admin.subjects.index')}}">
                                    <i class="ti-pencil-alt"></i>
                                    <span>Subject</span>
                                </a>
                            </li>
                            <!-- endif -->
                            <!-- if (Auth::user()->hasPermission('Course')) -->
                            <li>
                                <a href="{{ route('admin.courses.index') }}">
                                    <i class="ti-pencil-alt"></i>
                                    <span>Course</span>
                                </a>
                            </li>
                            <!-- endif -->
                        </ul>
                </li>
                <li>
                    <a href="{{ route('admin.lessons.create') }}">
                        <i class="ti-pencil-alt"></i>
                        <span>Lesson Upload</span>
                    </a>
                </li>
            </ul>
            </li>
            <!-- Lesson -->
            <!-- if (Auth::user()->hasPermission('Lesson')) -->
            <li> <a href="{{ route('admin.lessons.index') }}">
                    <i class="feather ft-home"></i>
                    <span>Lesson List</span>
                </a>
            </li>
            <!-- endif -->
            <!-- Store -->
            <!-- if (Auth::user()->hasPermission('Store')) -->
            <li> <a href="javascript:;">
                    <i class="feather ft-home"></i>
                    <span>Store</span>
                    <span class="float-right arrow">
                        <i class="ion ion-chevron-down"></i>
                    </span>
                </a>

                <ul>
                    <!-- if (Auth::user()->hasPermission('Course')) -->
                    <li> <a href="{{ route('admin.courses.products') }}">
                            <i class="feather ft-home"></i>
                            <span>Product Management</span>
                        </a></li>
                    <!-- endif -->
                    <li> <a href="{{ route('admin.subscriptions.index') }}">
                            <i class="feather ft-home"></i>
                            <span>Subscription Management</span>
                        </a></li>
                </ul>
            </li>
            <!-- endif -->
            <!-- Class -->
            <!-- if (Auth::user()->hasPermission('Class')) -->
            <li> <a href="{{ route('admin.classes.index') }}">
                    <i class="feather ft-home"></i>
                    <span>Class</span>
                </a>
            </li>
            <!-- endif -->
            <!-- Themes -->
            <!-- if (Auth::user()->hasPermission('Themes')) -->
            <li> <a href="{{ route('admin.videos.video-advertisement') }}">
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
                    <li> <a href="{{ route('admin.themes.homepage-banner') }}">
                            <i class="feather ft-home"></i>
                            <span>Homepage Banner</span>
                        </a></li>
                    <li> <a href="{{ route('admin.themes.homepage-sections') }}">
                            <i class="feather ft-home"></i>
                            <span>Homepage Sections</span>
                        </a></li>
                    <li> <a href="{{route('admin.banners.index')}}">
                            <i class="feather ft-home"></i>
                            <span>Settings</span>
                        </a></li>
                </ul>
            </li>
            <!-- endif -->
            <!-- Report -->
            <!-- if (Auth::user()->hasPermission('Report')) -->
            <li> <a href="javascript:;">
                    <i class="feather ft-home"></i>
                    <span>Report</span>
                    <span class="float-right arrow">
                        <i class="ion ion-chevron-down"></i>
                    </span>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.report.users') }}">
                            <i class="feather ft-home"></i>
                            <span>User</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.report.sales') }}">
                            <i class="feather ft-home"></i>
                            <span>Sale</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.report.contents') }}">
                            <i class="feather ft-home"></i>
                            <span>Content</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- endif -->
            <!-- User -->
            <!-- if (Auth::user()->hasPermission('User')) -->
            <li> <a href="javascript:;">
                    <i class="feather ft-home"></i>
                    <span>Account Management</span>
                    <span class="float-right arrow">
                        <i class="ion ion-chevron-down"></i>
                    </span>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.account.index') }}">
                            <i class="feather ft-home"></i>
                            <span>Account Management</span>
                        </a></li>
                    <li> <a href="{{route('admin.users.plans')}}">
                            <i class="feather ft-home"></i>
                            <span>Plan</span>
                        </a></li>
                    <li> <a href="{{ route('admin.userbank.index')}}">
                            <i class="feather ft-home"></i>
                            <span>Billing</span>
                        </a></li>
                    <li> <a href="{{route('admin.users.index')}}">
                            <i class="feather ft-home"></i>
                            <span>Admin</span>
                        </a></li>
                    <!-- Group -->
                    <!-- if (Auth::user()->hasPermission('Group')) -->
                    <li> <a href="{{route('admin.groups.index')}}">
                            <i class="feather ft-home"></i>
                            <span>Group</span>
                        </a></li>
                    <!-- endif -->
                </ul>
            </li>
            <!-- endif -->
            <!-- Setting -->
            <!-- if (Auth::user()->hasPermission('Setting')) -->
            <li>
                <a href="{{ route('admin.settings.index') }}">
                    <i class="feather ft-home"></i>
                    <span>Setting</span>
                    <span class="float-right arrow">
                        <i class="ion ion-chevron-down"></i>
                    </span>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.settings.logo') }}">
                            <i class="feather ft-home"></i>
                            <span>Logo</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.pages.index') }}">
                            <i class="feather ft-home"></i>
                            <span>Pages</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.settings.popup') }}">
                            <i class="feather ft-home"></i>
                            <span>Popup</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- endif -->
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script>
const toggleSetting = document.querySelector('.toggle-setting');
const settingList = document.querySelector('.setting-list');

toggleSetting.addEventListener('click', function() {
    this.classList.toggle('active');
});
</script>