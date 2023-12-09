@php
    $currentRouteName = Route::currentRouteName();
@endphp

<div class="col-xl-3 col-lg-3 col-md-12">
    <div class="dashboard__inner sticky-top">
        <!-- <div class="dashboard__nav__title">
            <h6>Welcome, Dond Tond </h6>
        </div> -->
        <div class="dashboard__nav">
            <ul>
                <li class="@if($currentRouteName == 'website.accounts') active @endif">
                    <a href="{{ route('website.accounts',['site_name'=>$site_name]) }}">
                    <i class="icofont-user"></i>
                        {{__('account.my_page')}}</a>
                </li>
                <li class="@if($currentRouteName == 'website.lessons') active @endif">
                    <a href="{{ route('website.lessons',['site_name'=>$site_name]) }}">
                    <i class="icofont-ui-video-chat"></i>
                    {{__('account.all_lessons')}}</a>
                </li>
                <li class="@if($currentRouteName == 'website.currently-watching') active @endif">
                    <a href="{{ route('website.currently-watching',['site_name'=>$site_name]) }}">
                    <i class="icofont-book"></i>
                    {{__('account.currently-watching')}}</a>
                </li>
                <li class="@if($currentRouteName == 'website.progress') active @endif">
                    <a href="{{ route('website.progress',['site_name'=>$site_name]) }}">
                    <i class="icofont-ui-clock"></i> 
                    {{__('account.progress')}}</a>
                </li>
                <li class="@if($currentRouteName == 'website.saved') active @endif">
                    <a href="{{ route('website.saved',['site_name'=>$site_name]) }}">
                    <i class="icofont-star"></i>
                    {{__('account.saved')}}</a>
                </li>
                <li class="@if($currentRouteName == 'website.notices') active @endif">
                    <a href="{{ route('website.notices',['site_name'=>$site_name]) }}">
                    <i class="icofont-notification"></i>
                    {{__('account.notice')}}</a>
                </li>
                <li class="@if($currentRouteName == 'website.q-a') active @endif">
                    <a href="{{ route('website.q-a',['site_name'=>$site_name]) }}">
                    <i class="icofont-question-circle"></i>
                    {{__('account.qas')}}</a>
                    <!-- <span class="dashboard__label">12</span> -->
                </li>
                <li class="@if($currentRouteName == 'website.logout') active @endif">
                    <a href="{{ route('website.logout',['site_name'=>$site_name]) }}">
                    <i class="icofont-logout"></i>
                    {{__('account.logout')}}</a>
                </li>
            </ul>
        </div>

    </div>
</div>