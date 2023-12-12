<div class="gridarea__wraper" style="min-height: 150px;">
    <div class="gridarea__img">
        @if(!$lesson->is_bought)
        <a href="{{ route('website.orders.create', ['item_id' => $lesson->course_id, 'type' => 'course', 'site_name' => $site_name]) }}">
        <img src="{{ asset($lesson->image_url_fm)}}" alt="grid">
        </a>
        @else
        <a href="{{ route('website.lessons.show',['id'=> $lesson->id,'site_name'=> $site_name]) }}">
        <img src="{{ asset($lesson->image_url_fm)}}" alt="grid">
        </a>
        @endif
       
        <div class="gridarea__small__icon">
            @if(!$lesson->is_bought)
            <i class="icofont-lock bg-dark"></i>
            @endif
            <a href="javascript:;" class="saved_whitlist"
                data-href="{{ route('website.saved_whitlist',['id'=> $lesson->id,'site_name'=> $site_name]) }}">
                <i class="icofont-heart-alt {{ $lesson->is_added_whitlist ? 'active' : '' }}"></i>
            </a>
        </div>

    </div>
    <div class="gridarea__content">
        <div class="gridarea__heading">
            <h3>
                @if(!$lesson->is_bought)
                <a href="{{ route('website.orders.create', ['item_id' => $lesson->course_id, 'type' => 'course', 'site_name' => $site_name]) }}">
                    {{ $lesson->name }}
                </a>
                @else
                <a href="{{ route('website.lessons.show',['id'=> $lesson->id,'site_name'=> $site_name]) }}">
                    {{ $lesson->name }}
                </a>
                @endif
            </h3>
        </div>
    </div>
</div>