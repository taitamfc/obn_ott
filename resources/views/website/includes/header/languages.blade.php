<ul class="language__dropdown">
@foreach( $app_languages as $app_lang_key => $app_language )
    <li>
        <a href="{{ route('changeLanguage',$app_lang_key) }}">
            <img loading="lazy" src="img/logo/logo__4.webp" class="img-fluid" alt="">
            {{$app_language}}
        </a>
    </li>
    @endforeach
</ul>