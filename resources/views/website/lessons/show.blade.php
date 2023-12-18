@extends('website.layouts.master')
@section('title')
{{ $item->name }}
@endsection
@section('content')
<style>
.rbtplayer video,
.rbtplayer iframe {
    width: 100%;
    min-height: 500px
}

.header__area.sticky {
    position: static;
}
</style>
<div class="tution sp_bottom_100 sp_top_50">
    <div class="container-fluid full__width__padding">
        <div class="row">
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 aos-init aos-animate" data-aos="fade-up">

                <div class="accordion content__cirriculum__wrap" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ $item->course->name }}
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @foreach($item->course->lessons as $lesson)
                                <div class="scc__wrap @if($item->id == $lesson->id) active-lesson @endif">
                                    <div class="scc__info">
                                        @if(!$lesson->is_bought)
                                        <i class="icofont-lock"></i>
                                        @else
                                        <i class="icofont-video-alt"></i>
                                        @endif
                                        <h5>
                                            @if(!$lesson->is_bought)
                                            <a
                                                href="{{ route('website.orders.create', ['item_id' => $lesson->course_id, 'type' => 'course', 'site_name' => $site_name]) }}">
                                                <span>{{ $lesson->name }}</span>
                                            </a>
                                            @else
                                            <a
                                                href="{{ route('website.lessons.show',['id'=> $lesson->id,'site_name'=> $site_name]) }}">
                                                <span>{{ $lesson->name }}</span>
                                            </a>
                                            @endif
                                        </h5>
                                        @if( in_array($lesson->id,$complete_lessonIds))
                                        <i class="icofont-tick-mark"></i>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 aos-init aos-animate" data-aos="fade-up">
                <div class="lesson__content__main">
                    <div class="lesson__content__wrap">
                        <h3>{{ $item->name }}</h3>
                        <span><a href="{{ route('website.lessons',['site_name' => $site_name]) }}">Close</a></span>
                    </div>
                    <div class="plyr__video-embed rbtplayer">
                        {!! $item->video_fm !!}
                    </div>
                    <div class="lesson__description">
                        {!! $item->description !!}
                    </div>
                    <button id="nextButton" data-id="{{$item->id}}" class="d-flex btn btn-primary ms-auto">{{__('sys.complete')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
var indexUrl = "{{ route('website.complete-lesson',['site_name'=>$site_name]) }}";

jQuery(document).ready(function() {
    jQuery('#nextButton').on('click', function(e) {
        e.preventDefault();
        let lessonId = $(this).data('id');
        $.ajax({
            type: 'indexUrl',
            url: indexUrl,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                lessonId: lessonId
            },
            success: function(response) {
                console.log(response);
                if (response.success) {
                    var nextLessonId = response.next_lesson_id;
                    if (nextLessonId) {
                        window.location.href =
                            "{{ route('website.lessons.show', ['id' => ':id', 'site_name' => $site_name]) }}"
                            .replace(':id', nextLessonId);
                    } else {
                        console.log("There are no further lessons.");
                    }
                } else {
                    console.log("Update failed: " + response.message);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
</script>
@endsection