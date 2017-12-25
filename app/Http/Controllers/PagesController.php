<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\Tag;
use App\Album;
use App\Http\Controllers\ManageController as MC;

class pagesController extends Controller
{
    //
    public function index(){
    	$i = Media::where('visibility', '1')->paginate(8);
    	$t = Tag::all();
    	// don't send full image
    	// use intervention to get a small sized image
    	// send tags with index page
    	$c_items = MC::getCurrentCarouselSpecs();
    	return view('pages.index')->withImages($i)->withCdata($c_items)->withTags($t);
    }

    public function getContact(){
    	// show contact page
    }

    public function postContact(){
    	// send mail via contact form
    }

    public function getPhotos($filter = null){
    	if($filter){
    		$m = Media::where('type', 'image')->paginate(8);
    	}
    	$m = Media::where('visibility', '1')->paginate(20);
    	return $this::index();//without effizy at bottom
    }

    public function getAlbums(){
    	$a = Album::all();
    	return $a;
    }
}
