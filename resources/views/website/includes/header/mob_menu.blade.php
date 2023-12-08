<div class="container-fluid mob_menu_wrapper">
    <div class="row align-items-center">
        <div class="col-6">
            <div class="mobile-logo">
                <a href="{{ route('cms',['site_name'=>$site_name]) }}" style="text-align: center;">
                    <img loading="lazy" src="{{ asset($site_setting['logo']) }}" alt="logo"
                        style="width: 169px;max-height: 100px;object-fit: contain;">
                </a>
            </div>
        </div>
        <div class="col-6">
            <div class="header-right-wrap">
                <div class="mobile-off-canvas">
                    <a class="mobile-aside-button" href="#"><i class="icofont-navigation-menu"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>