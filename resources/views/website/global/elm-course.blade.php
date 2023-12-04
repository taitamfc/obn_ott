<div class="gridarea__wraper">
    <div class="gridarea__img">
        <a href="{{ route('website.courses.show',['id'=> $course->id,'site_name'=> $site_name]) }}">
            <img src="{{ asset($course->image_url)}}" alt="grid">
        </a>
        <div class="gridarea__small__button">
            <div class="grid__badge">Monthly</div>
        </div>
    </div>
    <div class="gridarea__content">
        <div class="gridarea__heading">
            <h3><a href="{{ route('website.courses.show',['id'=> $course->id,'site_name'=> $site_name]) }}">{{ $course->name }}</a></h3>
        </div>
        <div class="gridarea__price">
            {{ $course->price }}
        </div>
        <div class="course__summery__button">
            <a href="{{ route('website.orders.create',['course_id'=> $course->id,'site_name'=> $site_name]) }}" class="default__button" href="#">Purchase</a>
        </div>
    </div>
</div>