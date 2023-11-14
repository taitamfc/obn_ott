<?php
   
namespace App\Http\Controllers;
   
use App\Models\Event;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
   
class FullCalenderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->user_id = Auth::id();
            return $next($request);
        });
    }  

    public function index(Request $request)
    {
        if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return Response::json($data);
        }
        return view('homes.index');
    }
    public function store(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end,
                       'user_id' => $this->user_id,
                    ];
        $event = Event::insert($insertArr);   
        return Response::json($event);
    }
    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);
        return Response::json($event);
    } 
    public function destroy(Request $request)
    {
        $event = Event::where('id',$request->id)->delete();
        return Response::json($event);
    }    
}