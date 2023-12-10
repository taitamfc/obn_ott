<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Models\Lesson;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Factory;

class ProcessVideoBunny implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private const API_URL = 'https://api.bunny.net/';//URL for BunnyCDN API
    protected const STORAGE_API_URL = 'https://storage.bunnycdn.com/';//URL for storage zone replication region (LA|NY|SG|SYD) Falkenstein is as default
    private const VIDEO_STREAM_URL = 'https://video.bunnycdn.com/';//URL for Bunny video stream API
    protected const HOSTNAME = 'storage.bunnycdn.com';//FTP hostname
    protected $lesson;
    protected $old_lesson;
    protected $access_key;
    protected $stream_library_access_key;
    protected $stream_library_id;
    protected $debug_request;

    /**
     * Create a new job instance.
     */
    public function __construct($lessonId,Lesson $old_lesson = null) {
        $this->lesson       = $lessonId;
        $this->old_lesson   = $old_lesson;

        $this->access_key                   = env('BUNNY_ACCESS_KEY','');
        $this->stream_library_access_key    = env('BUNNY_ACCESS_KEY','');
        $this->stream_library_id            = env('BUNNY_LIBRARY_ID','');
        $this->debug_request                = true;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->lesson = Lesson::find($this->lesson);
        try {
            $urlCreate = "https://video.bunnycdn.com/library/{$this->stream_library_id}/videos/";
            $response = Http::withHeaders([
                'AccessKey' => $this->stream_library_access_key
            ])->post($urlCreate, [
                'title' => $this->lesson->name,
            ]);
            if( $response->ok() ){
                $guid = $response->json('guid');
                if($guid){
                    $this->lesson->videoId = $guid;
                    $this->lesson->videoLibraryId = $this->stream_library_id;
                    $this->lesson->encodeProgress = 0;
                    $this->lesson->save();
                    $urlUpload = "library/{$this->stream_library_id}/videos/" . $guid;

                    if( $this->old_lesson ){
                        // Handle remove old video
                    }
                    $response = $this->APIcall('PUT', $urlUpload, array('file' => asset($this->lesson->video_url)), 'STREAM');
                }
            }else{
                throw new \Exception("Can not create video");
            }
        } catch (\Exception $e) {
            Log::error('Upload video API: '.$e->getMessage());
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

        curl_setopt($curl, CURLOPT_URL, self::VIDEO_STREAM_URL . $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("AccessKey: " . $this->stream_library_access_key, "Content-Type: application/*+json"));
        if ($method === "PUT") {
            curl_setopt($curl, CURLOPT_POSTFIELDS, file_get_contents($params['file']));
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);//Need this (Bunny net issue??)

        $result = curl_exec($curl);
        $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $debug_info = curl_getinfo($curl);
        curl_close($curl);

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
