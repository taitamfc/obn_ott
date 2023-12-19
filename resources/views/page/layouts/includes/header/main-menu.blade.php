@php
    $currentRouteName = Route::currentRouteName();
@endphp

<div class="headerarea__main__menu">
    <nav>
        <ul>
            <li class="">
                <a href="/">Home</a>
            </li>
            <li class="">
                <a href="{{route('planpage.index')}}">Plan</a>
            </li>
        </ul>
    </nav>
</div>
