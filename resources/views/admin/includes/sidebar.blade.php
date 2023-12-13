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
                @if (Auth::user()->hasPermission('Home'))
                <li> <a href="{{ route('admin.home') }}">
                        <i class="feather ft-home"></i>
                        <span>{{__('admin-sidebar.home')}}</span>
                    </a>
                </li>
                @endif
                <li> <a href="{{ route('admin.questionanswer.index') }}">
                        <i class="feather ft-home"></i>
                        <span>{{__('admin-sidebar.question')}}</span>
                    </a>
                </li>
                <!-- Content -->
                <li>
                    <a href="javascript:;">
                        <i class="feather ft-home"></i>
                        <span>{{__('admin-sidebar.content')}}</span>
                        <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
                    </a>
                    <ul>
                        <a href="{{ route('admin.settings.show') }}" class="toggle-setting">
                            <span class="ml-2">{{__('admin-sidebar.setting')}}</span>
                            <span class="float-right arrow">
                                <i class="ion ion-chevron-down"></i>
                            </span>
                        </a>
                        <ul class="setting-list">
                            <!-- if (Auth::user()->hasPermission('Grade')) -->
                            <li><a href="{{route('admin.grades.index')}}">
                                    <i class="ion-ios-folder-outline"></i>
                                    <span>{{__('admin-sidebar.grade')}}</span>
                                </a>
                            </li>
                            <!-- endif -->
                            <!-- if (Auth::user()->hasPermission('Subject')) -->
                            <li>
                                <a href="{{route('admin.subjects.index')}}">
                                    <i class="ti-pencil-alt"></i>
                                    <span>{{__('admin-sidebar.subject')}}</span>
                                </a>
                            </li>
                            <!-- endif -->
                            <!-- if (Auth::user()->hasPermission('Course')) -->
                            <li>
                                <a href="{{ route('admin.courses.index') }}">
                                    <i class="ti-pencil-alt"></i>
                                    <span>{{__('admin-sidebar.course')}}</span>
                                </a>
                            </li>
                            <!-- endif -->
                        </ul>
                </li>
                <li>
                    <a href="{{ route('admin.lessons.create') }}">
                        <i class="ti-pencil-alt"></i>
                        <span>{{__('admin-sidebar.lesson-upload')}}</span>
                    </a>
                </li>
            </ul>
            </li>
            <!-- Lesson -->
            <!-- if (Auth::user()->hasPermission('Lesson')) -->
            <li> <a href="{{ route('admin.lessons.index') }}">
                    <i class="feather ft-home"></i>
                    <span>{{__('admin-sidebar.lesson-list')}}</span>
                </a>
            </li>
            <!-- endif -->
            <!-- Store -->
            <!-- if (Auth::user()->hasPermission('Store')) -->
            <li> <a href="javascript:;">
                    <i class="feather ft-home"></i>
                    <span>{{__('admin-sidebar.store')}}</span>
                    <span class="float-right arrow">
                        <i class="ion ion-chevron-down"></i>
                    </span>
                </a>

                <ul>
                    <!-- if (Auth::user()->hasPermission('Course')) -->
                    <li> <a href="{{ route('admin.courses.products') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.product-management')}}</span>
                        </a></li>
                    <!-- endif -->
                    <li> <a href="{{ route('admin.subscriptions.index') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.subscription-management')}}</span>
                        </a></li>
                </ul>
            </li>
            <!-- endif -->

            <!-- Duration -->
            <li> <a href="{{ route('admin.durations.index') }}">
                    <i class="feather ft-home"></i>
                    <span>{{__('admin-sidebar.duration')}}</span>
                </a>
            </li>

            <!-- Class -->
            <!-- if (Auth::user()->hasPermission('Class')) -->
            <li> <a href="{{ route('admin.classes.index') }}">
                    <i class="feather ft-home"></i>
                    <span>{{__('admin-sidebar.class')}}</span>
                </a>
            </li>

            <li> <a href="{{ route('admin.orders.index') }}">
                    <i class="feather ft-home"></i>
                    <span>Order</span>
                </a>
            </li>
            <!-- endif -->
            <!-- Themes -->
            <!-- if (Auth::user()->hasPermission('Themes')) -->
            <li> <a href="{{ route('admin.videos.video-advertisement') }}">
                    <i class="feather ft-home"></i>
                    <span>{{__('admin-sidebar.video-advertisement')}}</span>
                </a>
            </li>
            <li> <a href="javascript:;">
                    <i class="feather ft-home"></i>
                    <span>{{__('admin-sidebar.themes')}}</span>
                    <span class="float-right arrow">
                        <i class="ion ion-chevron-down"></i>
                    </span>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.themes.homepage-banner') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.homepage-banner')}}</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.themes.homepage-sections') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.homepage-sections')}}</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.themes.footer-sections') }}">
                            <i class="feather ft-home"></i>
                            <span>Footer Sessions</span>
                        </a>
                    </li>
                    <li> <a href="{{route('admin.banners.index')}}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.settings')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- endif -->
            <!-- Report -->
            <!-- if (Auth::user()->hasPermission('Report')) -->
            <li> <a href="javascript:;">
                    <i class="feather ft-home"></i>
                    <span>{{__('admin-sidebar.report')}}</span>
                    <span class="float-right arrow">
                        <i class="ion ion-chevron-down"></i>
                    </span>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.report.users') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.user')}}</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.report.sales') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.sale')}}</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.report.contents') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.content')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- endif -->
            <!-- User -->
            <!-- if (Auth::user()->hasPermission('User')) -->
            <li> <a href="javascript:;">
                    <i class="feather ft-home"></i>
                    <span>{{__('admin-sidebar.account-management')}}</span>
                    <span class="float-right arrow">
                        <i class="ion ion-chevron-down"></i>
                    </span>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.account.index') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.account-management')}}</span>
                        </a></li>
                    <li> <a href="{{route('admin.users.plans')}}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.plan')}}</span>
                        </a></li>
                    <li> <a href="{{ route('admin.userbank.index')}}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.billing')}}</span>
                        </a></li>
                    <li> <a href="{{route('admin.users.index')}}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.admin')}}</span>
                        </a></li>
                    <!-- Group -->
                    <!-- if (Auth::user()->hasPermission('Group')) -->
                    <li> <a href="{{route('admin.groups.index')}}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.group')}}</span>
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
                    <span>{{__('admin-sidebar.setting')}}</span>
                    <span class="float-right arrow">
                        <i class="ion ion-chevron-down"></i>
                    </span>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.settings.logo') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.logo')}}</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.pages.index') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.pages')}}</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.settings.popup') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.popup')}}</span>
                        </a>
                    </li>
                    <li> <a href="{{ route('admin.sites.index') }}">
                            <i class="feather ft-home"></i>
                            <span>{{__('admin-sidebar.sites')}}</span>
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