<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Page;  

class PageController extends MainController
{
    public function show($site_name, $id)
    {
        $item = Page::find($id);
    
        if (!$item) {
            // Xử lý trường hợp không tìm thấy trang
            abort(404);
        }
    
        $params = [
            'item' => $item,
        ];
    
        return view('website.pages.show', $params);
    }
}
