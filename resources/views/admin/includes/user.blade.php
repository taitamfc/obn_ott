<li class="user-dropdown">
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset( $cr_admin->image_url_fm ) }}" alt="" class="img-fluid">
        </button>
        <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton">
            <div class="dropdown-header d-flex flex-column align-items-center">
                <div class="user_img mb-3">
                    <img src="{{ asset( $cr_admin->image_url_fm ) }}" alt="User Image">
                </div>
                <div class="user_bio text-center">
                    <p class="name font-weight-bold mb-0">{{ $cr_admin->name }}</p>
                    <p class="email text-muted mb-3"><a class="pl-3 pr-3"
                            href="{{ route('admin.account.index') }}">{{ $cr_admin->email }}</a></p>
                </div>
            </div>
            <a class="dropdown-item" href="{{ route('admin.account.index') }}"><i class="ti-user"></i>
                {{__('site.profile')}}</a>
            <a class="dropdown-item" href="{{ route('cms',['site_name'=>$cr_site->slug]) }}"><i
                    class="ti-home"></i>{{__('site.view-website')}}</a>
            <span role="separator" class="divider"></span>
            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ti-power-off"></i>{{__('site.logout')}}</a>
        </div>
    </div>
</li>