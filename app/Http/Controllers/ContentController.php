<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Galery;
use App\Notice;
use App\MediaGalery;
use App\Media;

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

        $galery = Media::with('galery')->where('type','img')->get()->reverse()->take(12);
    	$notices = Notice::with('media')->get()->reverse()->take(4);

		return view('home',compact('galery','notices'));
        
    }

    public function moreNotices()
    {
        $notices = Notice::with('media')->get()->reverse();
        return view('partials.notices.more',compact('notices'));
    }

    public function moreGalery() 
    {
        $galery = Galery::with('media')->get()->reverse();

        return view('partials.galery.more',compact('galery'));
    }
}
