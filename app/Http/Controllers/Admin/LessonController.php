<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Course;
use App\Models\LessonCourse;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Auth;
use stdClass;
use Corbpie\BunnyCdn\BunnyAPIStream;
class LessonController extends AdminController
{
    use UploadFileTrait;
    private const API_URL = 'https://api.bunny.net/';//URL for BunnyCDN API
    protected const STORAGE_API_URL = 'https://storage.bunnycdn.com/';//URL for storage zone replication region (LA|NY|SG|SYD) Falkenstein is as default
    private const VIDEO_STREAM_URL = 'https://video.bunnycdn.com/';//URL for Bunny video stream API
    protected const HOSTNAME = 'storage.bunnycdn.com';//FTP hostname

    public function __construct(){
        parent::__construct();
        $this->access_key                   = env('BUNNY_ACCESS_KEY','');
        $this->stream_library_access_key    = env('BUNNY_ACCESS_KEY','');
        $this->stream_library_id            = env('BUNNY_LIBRARY_ID','');
        $this->debug_request                = true;
    }
    public function index(Request $request)
    {
        try {
        // $this->authorize('Lesson',Lesson::class);
        if($request->ajax()){
            $grades = Grade::getActiveItems($this->site_id);
            $subjects = Subject::getActiveItems($this->site_id);
            $courses = Course::getActiveItems($this->site_id);
            $query = Lesson::where('site_id',$this->site_id)->withCount('lessonstudent');
            if($request->name){
                $query->where('name','LIKE','%'.$request->name.'%');
            }
            if($request->grade_id){
                $query->where('grade_id',$request->grade_id);
            }
            if($request->subject_id){
                $query->where('subject_id',$request->subject_id);
            }
            if($request->course_id){
                $query->where('course_id',$request->course_id);
            }
            switch ($request->sortBy) {
                // Sort grade 
                case 'grade_desc':
                    $query->with(['grade' => function ($q) {
                        $q->orderBy('name', 'desc');
                    }]);
                    break;
                case 'grade_asc':
                    $query->with(['grade' => function ($q) {
                        $q->orderBy('name', 'asc');
                    }]);
                    break;
                // Sort Subject
                case 'subject_desc':
                    $query->with(['subject' => function ($q) {
                        $q->orderBy('name', 'desc');
                    }]);
                    break;
                case 'subject_asc':
                    $query->with(['subject' => function ($q) {
                        $q->orderBy('name', 'asc');
                    }]);
                    break;
                // Sort Course
                case 'course_desc':
                    $query->with(['course' => function ($q) {
                        $q->orderBy('name', 'desc');
                    }]);
                    break;
                case 'course_asc':
                    $query->with(['course' => function ($q) {
                        $q->orderBy('name', 'asc');
                    }]);
                    break;
                default : 
                    $query->orderBy('id','desc');
                    break;
                }
            $query->with('grade', 'subject', 'course');
            $items = $query->paginate(20);
            return view('admin.lessons.ajax-index',compact('items','grades','subjects','courses'));
        }
        return view('admin.lessons.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response([
                'success' => true,
                'message' => 'Error'
            ]);
        }
    }
    public function create()
    {
        // $this->authorize('Lesson',Lesson::class);
        $grades = Grade::getActiveItems($this->site_id);
        $subjects = Subject::getActiveItems($this->site_id);
        $courses = Course::getActiveItems($this->site_id);
        $item = new Lesson();
        
        return view('admin.lessons.create',compact('grades','subjects','courses','item'));
    }
    public function storeVideo(Request $request)
    {
        $video_url = '';
        try {
            if ($request->hasFile('file')) {
                $video = $request->file('file');
            }else{
                throw new Exception("Can not upload video");
            }
            $urlCreate = "https://video.bunnycdn.com/library/{$this->stream_library_id}/videos/";
            // Create video
            $response = Http::withHeaders([
                'AccessKey' => $this->stream_library_access_key
            ])->post($urlCreate, [
                'title' => md5(time()),
            ]);
            if( $response->ok() ){
                $guid = $response->json('guid');
                if($guid){
                    $response = $this->APIcall('PUT', "library/{$this->stream_library_id}/videos/" . $guid, array('file' => $video->path()), 'STREAM');
                    if( !empty($response['url']) ){
                        $video_url = $response['url'];
                    }
                }
            }else{
                throw new Exception("Can not create video");
            }
        } catch (\Exception $e) {
            Log::error('Upload video API: '.$e->getMessage());
        }
        return $video_url;
        
    }
    public function store(StoreLessonRequest $request)
    {
        $item = new Lesson();
        $item->name = $request->name;
        $item->subject_id = $request->subject_id;
        $item->grade_id = $request->grade_id;
        $item->course_id = $request->course_id;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->site_id = $this->site_id;
        $item->video_url = $request->video;
        try {
            DB::beginTransaction();

            // if ($request->hasFile('video')) {
            //     $item->video_url = $this->uploadFile($request->file('video'), 'uploads/'.Auth::id().'/lessons/video');
            // }
            if ($request->hasFile('image')) {
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/'.Auth::id().'/lessons/image');
            } 
            
            if($item->save()){
                $lessoncourse = new LessonCourse();
                $lessoncourse->lesson_id = $item->id;
                $lessoncourse->subject_id = $request->subject_id;
                $lessoncourse->grade_id = $request->grade_id;
                $lessoncourse->course_id = $request->course_id;
                $lessoncourse->site_id = $this->site_id;
                $lessoncourse->save();
            }
            DB::commit();

            return response([
                'success' => true,
                'message' => __('sys.store_item_success'),
                'redirect' => route('admin.lessons.index')
            ],200);
        } catch (QueryException $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => __('sys.store_item_error'),
            ],200);
        }
    }
    function edit($id){

        // $this->authorize('Lesson',Lesson::class);
        try{
            $item = Lesson::where('site_id',$this->site_id)->findOrfail($id);
            
            $grades = Grade::getActiveItems($this->site_id);
            $subjects = Subject::getActiveItems($this->site_id);
            $courses = Course::getActiveItems($this->site_id);

            return view('admin.lessons.edit',compact('item','grades','subjects','courses'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => __('sys.update_item_error'),
            ],200);
        }
    }
    function update(UpdateLessonRequest $request,$id){
        try {
            DB::beginTransaction();
            $item = Lesson::findOrfail($id);
            // Get old value
            $old_course_id = $item->course_id;
            $old_subject_id = $item->subject_id;
            $old_grade_id = $item->grade_id;
            // Push new value
            $item->name = $request->name;
            $item->subject_id = $request->subject_id;
            $item->grade_id = $request->grade_id;
            $item->course_id = $request->course_id;
            $item->description = $request->description;
            $item->status = $request->status;
            $item->site_id = $this->site_id; 
            $item->video_url = $this->video;           
            // if ($request->hasFile('video')) {
            //     $this->deleteFile([$item->video_url]);
            //     $item->video_url = $this->uploadFile($request->file('video'), 'uploads/'.Auth::id().'/lessons/video');
            // }
            if ($request->hasFile('image')) {
                $this->deleteFile([$item->image_url]);
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/'.Auth::id().'/lessons/image');
            } 
            if($item->save()){
                LessonCourse::where('lesson_id',$item->id)->where('course_id',$old_course_id)->where('subject_id',$old_subject_id)->where('grade_id',$old_grade_id)->delete();
                $lessoncourse = new LessonCourse();
                $lessoncourse->lesson_id = $item->id;
                $lessoncourse->subject_id = $request->subject_id;
                $lessoncourse->grade_id = $request->grade_id;
                $lessoncourse->course_id = $request->course_id;
                $lessoncourse->site_id = $this->site_id;
                $lessoncourse->save();
            }
            DB::commit();
            return response([
                'success' => true,
                'message' => __('sys.update_item_success'),
                'redirect' => route('admin.lessons.index')
            ],200);
        } catch (QueryException $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => __('sys.update_item_error')
            ],200);
        }
    }
    function position(Request $request){
        try {
            foreach ($_REQUEST['item'] as $key => $value) {
                $item = Lesson::findOrfail($value);
                $item->position = $key;
                $item->save();
            }
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('admin.lessons.index')->with('error',__('sys.update_item_error'));
        }
    }
    public function destroy(string $id)
    {
        try {
            $item = Lesson::where('site_id',$this->site_id)->findOrfail($id);
            LessonCourse::where('site_id',$this->site_id)
            ->where('lesson_id',$item->id)
            ->where('grade_id',$item->grade_id)
            ->where('subject_id',$item->subject_id)
            ->where('course_id',$item->course_id)
            ->delete();
            $item->delete();
            return response([
                'success' => true,
                'message' => __('sys.destroy_item_success'),
                'redirect' => route('admin.lessons.index')
            ],200);
        } catch (QueryException $e) {
            return response([
                'success' => false,
                'message' => __('sys.destroy_item_error'),
            ],200);
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }

    protected function APIcall(string $method, string $url, array $params = [], string $url_type = 'BASE'): array
    {
        $curl = curl_init();
        if ($method === "GET") {//GET request
            if (!empty($params)) {
                $url = sprintf("%s?%s", $url, http_build_query($params));
            }
        } elseif ($method === "POST") {//POST request
            curl_setopt($curl, CURLOPT_POST, 1);
            if (!empty($params)) {
                $data = json_encode($params);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
        } elseif ($method === "PUT") {//PUT request
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($url_type === 'STORAGE') {
                $params = json_decode(json_encode($params));
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_UPLOAD, 1);
                curl_setopt($curl, CURLOPT_INFILE, fopen($params->file, 'rb'));
                curl_setopt($curl, CURLOPT_INFILESIZE, filesize($params->file));
            } else {
                $data = json_encode($params);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
        } elseif ($method === "DELETE") {//DELETE request
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            if (!empty($params)) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
            }
        }

        if ($url_type === 'BASE') {//General CDN
            curl_setopt($curl, CURLOPT_URL, self::API_URL . $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Accept: application/json", "AccessKey: $this->api_key", "Content-Type: application/json"));
        } elseif ($url_type === 'STORAGE') {//Storage zone
            curl_setopt($curl, CURLOPT_URL, self::STORAGE_API_URL . $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("AccessKey: $this->access_key"));
        } else {//Video stream
            curl_setopt($curl, CURLOPT_URL, self::VIDEO_STREAM_URL . $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("AccessKey: " . $this->stream_library_access_key, "Content-Type: application/*+json"));
            if ($method === "PUT") {
                curl_setopt($curl, CURLOPT_POSTFIELDS, file_get_contents($params['file']));
            }
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);//Need this (Bunny net issue??)

        $result = curl_exec($curl);
        $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $debug_info = curl_getinfo($curl);
        curl_close($curl);

        if ($this->debug_request) {
            return $debug_info;
        }
        if ($responseCode === 204) {
            return [
                'http_code' => $responseCode,
                'response' => json_decode($result, true),
            ];
        }
        if ($responseCode >= 200 && $responseCode < 300) {
            return json_decode($result, true) ?? [];
        }
        return [
            'http_code' => $responseCode,
            'response' => json_decode($result, true),
        ];
    }
}