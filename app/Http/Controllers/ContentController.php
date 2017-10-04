<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Galery;
use App\Notice;

use Carbon\Carbon;

class ContentController extends Controller
{
	/**
     * Show home.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        $carbon = Carbon::parse('2017-05-12')->diffForHumans();

    	$galery     = Galery::with('media')->get()->reverse()->take(8);
    	$notices = Notice::with('media')->get()->reverse()->take(3);
        //$lastNotice = $allNotices->last();

        // $notices = $allNotices->filter(function ($value, $key) use ($lastNotice) {

        //     return $value->id != $lastNotice->id;

        // })->reverse()->take(2);

		return view('home',compact('galery','notices'));
        
    }
}
