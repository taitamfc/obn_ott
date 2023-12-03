<li class="dropdown">
    <span class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
        {{ __('site.current_site') }}: {{ $cr_site->name }}
    </span>
    <div class="dropdown-menu navbar-dropdown">
        @foreach($cr_admin_sites as $cr_admin_site)
        <a class="dropdown-item" href="{{ route('admin.sites.changeSite',$cr_admin_site->id) }}">
            {{ $cr_admin_site->name }}
        </a>
        @endforeach
    </div>
</li>   