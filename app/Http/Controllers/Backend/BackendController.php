<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
	 protected $limit = 5;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check-permissions');
    }

    public function error()
    {
        $title = session('error')['title'];
        $addr = session('error')['addr'];

        return redirect("backend/$addr")->with('message',"You can delete default {$title}");
    }

}
