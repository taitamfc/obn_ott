<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'site_id', 'type', 'action', 'is_read', 'item_id'];
    // RelationShip
    function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    function site(){
        return $this->belongsTo(Site::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    function lesson(){
        return $this->belongsTo(Lesson::class);
    }
    function subject(){
        return $this->belongsTo(Subject::class);
    }

    static function deleteNotification($notiid){
        $noti = Notification::find($notiid);
        if($noti){
            $noti->delete();
        }
    }

    //Feature 
    function GetUserNameAttribute(){
        return isset($this->user) ? $this->user->name : '';
    }
    function GetLessonNameAttribute(){
        return isset($this->lesson) ? $this->lesson->name : '';
    }
    function GetSubjectNameAttribute(){
        return isset($this->subject) ? $this->subject->name : '';
    }
    function getItemNameAttribute(){
        $item_name = '';
        switch ($this->type) {
            case 'new_faq':
                $item_name = 'New faq';
                break;
            case 'new_order':
                $item_name = 'New order';
                break;
            case 'reply_faq':
                $item_name = 'New reply';
                break;
            
            default:
                # code...
                break;
        }
        return $item_name;
    }

    function getItemIconAttribute(){
        $item_icon = '';
        switch ($this->type) {
            case 'new_faq':
                $item_icon = '<i class="ti-map-alt bg_blue"></i>';
                break;
            case 'new_order':
                $item_icon = '<i class="ti-heart bg_danger"></i>';
                break;
            
            default:
                # code...
                break;
        }
        return $item_icon;
    }
    function getItemLinkAttribute(){
        $site_id = $this->site_id;
        $site    = Site::find($site_id);
        $item_link = '';
        switch ($this->type) {
            case 'new_faq':
                $item_link = route('admin.questionanswer.edit', ['questionanswer' => $this->item_id]).'?notiid=' . $this->id;
                break;
            case 'new_order':
                $item_link = route('admin.orders.index').'?notiid=' . $this->id;
                break;
            case 'reply_faq':
                $item_link = route('website.q-a.show',['site_name'=>$site->slug,'id'=>$this->item_id]).'?notiid=' . $this->id;
                break;
            default:
                # code...
                break;
        }
        return $item_link;
    }
}