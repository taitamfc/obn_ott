<?php

namespace App\Http\Controllers\Adminsystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;

class ReportController extends Controller
{
    function index(Request $request){
        $items = Transactions::get();
        $items = json_encode($items);
        return view('adminsystems.reports.index',compact('items'));
    }
}