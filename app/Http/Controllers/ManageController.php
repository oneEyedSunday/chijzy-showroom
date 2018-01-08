<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\Album;
use DB;

class ManageController extends Controller
{
    //
    public function dashboard(){
        $a = Album::all()->count();
        $m = Media::all()->count();
    	return view('manage.dashboard')->withMedia($m)->withAlbums($a);
    }

    public function index(){
    	return redirect()->route('manage.dashboard');
    }

    public function managefront(){
    	$carousel = self::getCurrentCarouselSpecs();
    	return view('manage.front')->withCurrentCarousel($carousel)->withnc(self::$noofC);
    }

    public function setfromFrontEnd(Request $request){
        // dd($request);
        if($request->noCarousel != self::getMaxCarousel()){
            self::setMaxCarousel($request->noCarousel);
        }
        return redirect()->route('manage.frontend')->withCurrentCarousel(self::getMaxCarousel());
    }

    public function postfront(Request $request){
        // dd($request);
        $bare = [];
        for($i = 1; $i < 6; $i++){
            $bare[$i]['img_src'] =  $request->input('img_src' . $i);
            $bare[$i]['position'] = $request->input('position' . $i);
            $bare[$i]['heading'] = $request->input('heading' . $i);
            $bare[$i]['text_body'] = $request->input('text' . $i);
            $bare[$i]['link_text'] = $request->input('link_text' . $i);
            $bare[$i]['link_ref'] = $request->input('link_ref' . $i);
            $bare[$i]['visible'] = $request->input('state' . $i);
        }

        // dd($bare);
        DB::table('frontends')->truncate();
        DB::table('frontends')->insert($bare );
        return redirect()->route('manage.frontend')->with('success','Carousel updated successfully.');
    }

    static $noofC = 5;

    
    static function getCurrentCarouselSpecs($filter = 'false'){
        if($filter == 'true'){
            $fromdb = DB::table('frontends')->where('visible', '1')->get();
            return $fromdb;
        }

        $fromdb = DB::table('frontends')->select()->get();
        // dd($fromdb);
        $toscreen = array_fill(0, 5, new FrontEnd);
        for ($i= 0; $i < count($fromdb); $i++) {
                $toscreen[$i]  = $fromdb[$i];            
        }

        

        return $toscreen;
    }

}

class FrontEnd {
    public $img_src = "";
    public $img_alt = "";
    public $heading = "";
    public $text_body = "";
    public $link_text = "";
    public $link_ref = "";
    public $position = "";
    public $visible = 0;
}