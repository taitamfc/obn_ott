<div class="gridarea__wraper">
    <div class="gridarea__img">
        <a href="{{ route('website.courses.show',['id'=> $course->id,'site_name'=> $site_name]) }}">
            <img src="{{ asset($course->image_url)}}" alt="grid">
        </a>
    </div>
    <div class="gridarea__content">
        <div class="gridarea__list">
            <ul>
                <li>
                    <i class="icofont-book-alt"></i> {{ $course->lessons_count }} {{__('home.lessons')}}
                </li>
            </ul>
        </div>
        <div class="gridarea__heading">
            <h3><a
                    href="{{ route('website.courses.show',['id'=> $course->id,'site_name'=> $site_name]) }}">{{ $course->name }}</a>
            </h3>
        </div>
        <div class="gridarea__price">
            {{ $course->price_fm }}
        </div>
        @if(!$course->is_bought)
        <div class="course__summery__button">
            <a href="{{ route('website.orders.create',['site_name'=> $site_name, 'item_id' => $course->id,'type'=>'course']) }}"
                class="default__button">{{__('sys.purchase')}}</a>
        </div>
        @endif
    </div>
</div>