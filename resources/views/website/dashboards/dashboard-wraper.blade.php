<div class="container-fluid full__width__padding">
        <div class="row">
            <div class="col-xl-12">
                <div class="dashboardarea__wraper">
                    <div class="dashboardarea__img">
                        <div class="dashboardarea__inner student__dashboard__inner">
                            <div class="dashboardarea__left">
                                <div class="dashboardarea__left__img">
                                    <img loading="lazy" src="{{ asset('website/img/teacher/teacher__2.png')}}" alt="">
                                </div>
                                <div class="dashboardarea__left__content">
                                <h4>{{ Auth::guard('students')->user()->name }}</h4>
                                    <ul>
                                        <li> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-book-open">
                                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                            </svg>
                                            {{ Auth::guard('students')->user()->lessons()->count() }} Lessons Enroled
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>