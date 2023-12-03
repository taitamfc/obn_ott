<div class="breadcrumbarea">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__content__wraper" data-aos="fade-up">
                    <div class="breadcrumb__title">
                        <h2 class="heading">{{ $page_title }}</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="{{ route('cms',['site_name'=>$site_name]) }}">Home</a></li>
                            <li>{{ $page_title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>