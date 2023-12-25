<li class="dropdown d_none_sm">
    <div id="languageDropdown">
        <span class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
            <i class="flag-icon flag-icon-{{$cr_lang == 'en' ? 'us' : $cr_lang}}"></i>
        </span>
        <div class="dropdown-menu navbar-dropdown">
            @foreach( $app_languages as $app_lang_key => $app_language )
            <a class="dropdown-item font-weight-medium" href="{{ route('changeLanguage',$app_lang_key) }}">
                <i class="flag-icon flag-icon-{{$app_lang_key == 'en' ? 'us' : $app_lang_key}} mr-2"></i>
                {{$app_language}}
            </a>
            @endforeach
        </div>
    </div>
</li>   