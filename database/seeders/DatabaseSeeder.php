<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SiteSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\GroupRoleSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\QuestionSeeder;
use Database\Seeders\GradeQuestion;
use Database\Seeders\CourseQuestion;
use Database\Seeders\LessonQuestion;
use Database\Seeders\LessonCourseSeeder;
use Database\Seeders\LessonStudentSeeder;
use Database\Seeders\PageStudentSeeder;
use Database\Seeders\PlanSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\StudentCourseSeeder;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\SubscriptionSeeder;
use Database\Seeders\SubscriptionCourseSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\GroupSiteSeeder;
use Database\Seeders\TransactionSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(SiteSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(GroupRoleSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(LessonCourseSeeder::class);
        $this->call(LessonStudentSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(StudentCourseSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(SubscriptionCourseSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(GroupSiteSeeder::class);
        $this->call(TransactionSeeder::class);
    }
}