<div class="gridarea__wraper">
    <div class="gridarea__img">
        <a href="{{ route('website.subjects.show',['id'=> $subject->id,'site_name'=> $site_name]) }}">
            <img src="{{ asset($subject->img ?? 'assets/images/default.png')}}" alt="grid">
        </a>
    </div>
    <div class="gridarea__content">
         <div class="gridarea__list">
            <ul>
                <li>
                    <i class="icofont-book-alt"></i> {{ $subject->lessons_count }} {{__('home.lessons')}}
                </li>
            </ul>
        </div>
        <div class="gridarea__heading">
            <h3><a href="{{ route('website.subjects.show',['id'=> $subject->id,'site_name'=> $site_name]) }}">{{ $subject->name }}</a></h3>
        </div>
    </div>
</div>