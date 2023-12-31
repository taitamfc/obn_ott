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
                <!-- Setting -->
                <li> <a href="{{ route('adminsystem.sites.index') }}">
                        <i class="feather ft-home"></i>
                        <span>Sites</span>
                    </a>
                </li>
                <li> <a href="{{ route('adminsystem.users.index') }}">
                        <i class="feather ft-home"></i>
                        <span>users</span>
                    </a>
                </li>
                <li> <a href="{{ route('plans.index') }}">
                        <i class="feather ft-home"></i>
                        <span>plans</span>
                    </a>
                </li>
                <li> <a href="{{ route('admins.index') }}">
                        <i class="feather ft-home"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li> <a href="{{ route('notices.index') }}">
                        <i class="feather ft-home"></i>
                        <span>Notices</span>
                    </a>
                </li>
                <li> <a href="{{ route('adminsystem.logout') }}">
                        <i class="feather ft-home"></i>
                        <span>LogOut</span>
                    </a>
                </li>
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