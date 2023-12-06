
<div class="gridarea__wraper">
    <div class="gridarea__img">
        <a href="{{ route('website.lessons.show',['id'=> $lesson->id,'site_name'=> $site_name]) }}">
            <img src="{{ asset($lesson->image_url)}}" alt="grid">
        </a>
         <div class="gridarea__small__icon">
            <a href="javascript:;" class="saved_whitlist" data-href="{{ route('website.saved_whitlist',['id'=> $lesson->id,'site_name'=> $site_name]) }}">
                <i class="icofont-heart-alt {{ $lesson->is_added_whitlist ? 'active' : '' }}"></i>
            </a>
        </div> 

    </div>
    <div class="gridarea__content">
        <div class="gridarea__heading">
            <h3>
                <a href="{{ route('website.lessons.show',['id'=> $lesson->id,'site_name'=> $site_name]) }}">
                    {{ $lesson->name }}
                </a>
            </h3>
        </div>
    </div>
</div>