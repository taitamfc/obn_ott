<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Banner;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use App\Models\Group;
use App\Policies\BannerPolicy;
use App\Models\Lesson;
use App\Policies\CoursePolicy;
use App\Policies\GradePolicy;
use App\Policies\GroupPolicy;
use App\Policies\LessonPolicy;
use App\Policies\SubjectPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Lesson::class => LessonPolicy::class,
        Banner::class => BannerPolicy::class,
        Grade::class => GradePolicy::class,
        Subject::class =>SubjectPolicy::class,
        Course::class => CoursePolicy::class,
        User::class => UserPolicy::class,
        Group::class => GroupPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
