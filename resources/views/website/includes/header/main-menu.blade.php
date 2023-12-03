<div class="headerarea__main__menu">
    <nav>
        <ul>
            @foreach( $site_menus as $site_menu )
            <li>
                <a href="{{ route('website.grades.show',['id'=> $site_menu->id,'site_name'=> $site_name]) }}">{{ $site_menu->name }}</a>
            </li>
            @endforeach
        </ul>
    </nav>
</div>