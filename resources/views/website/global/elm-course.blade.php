<div class="gridarea__wraper">
    <div class="gridarea__img">
        <a href="{{ route('website.courses.show',['id'=> $course->id,'site_name'=> $site_name]) }}">
            <img src="{{ asset($course->image_url)}}" alt="grid">
        </a>
    </div>
    <div class="gridarea__content">
        <div class="gridarea__heading">
            <h3><a
                    href="{{ route('website.courses.show',['id'=> $course->id,'site_name'=> $site_name]) }}">{{ $course->name }}</a>
            </h3>
        </div>
        <div class="gridarea__price">
            {{ $course->price_fm }}
        </div>
        <div class="course__summery__button">
            <a href="{{ route('website.orders.create',['site_name'=> $site_name, 'item_id' => $course->id,'type'=>'course']) }}"
                class="default__button">Purchase</a>
        </div>
    </div>
</div>