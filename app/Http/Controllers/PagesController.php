<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\Tag;
use App\Album;
use App\Http\Controllers\ManageController as MC;
use Mail;
use Session;

class pagesController extends Controller
{
    //
    public function index(){
    	$i = Media::where('visibility', '1')->paginate(12);
    	$t = Tag::all();
    	$c_items = MC::getCurrentCarouselSpecs('true');
    	return view('pages.index')->withImages($i)->withCdata($c_items)->withTags($t);
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'required|min:10'
        ]);

        $data = ['email' => $request->email, 'subject'=> $request->subject, 'bodyMessage'=> $request->message];

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('idiakosesunday@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email was sent!');

        return redirect('/');
    }

    public function getPhotos(Request $request, $tag = null){
        $allt = Tag::all();
        if($request->tag){
            $t = Tag::where('name', '=', $request->tag)->first();
            $p = $t->media()->where(['category' => 'photos', 'visibility' => '1'])->paginate(8);
        }else{
           // get all media tagged photos
        $p = Media::where(['category' => 'photos', 'visibility' => '1'])->paginate(8); 
        }
    	return view('pages.photos')->withImages($p)->withTags($allt);
    }

    public function getDesigns(Request $request, $tag = null){
        $allt = Tag::all();
        if($request->tag){
            $t = Tag::where('name', '=', $request->tag)->first();
            $p = $t->media()->where(['category' => 'designs', 'visibility' => '1'])->paginate(8);
        }else{
           // get all media tagged photos
        $p = Media::where(['category' => 'designs', 'visibility' => '1'])->paginate(8); 
        }
        return view('pages.designs')->withImages($p)->withTags($allt);
    }

    public function getAlbums(){
    	$a = Album::all();
    	return view('pages.albums')->withAlbums($a);
    }

    public function MediaInAlbum($slug){
        $a = Album::where('slug','=', $slug)->first();
        $m = $a->media()->where(['visibility' => '1'])->get();
        return view('pages.album-detail')->withMedia($m);

    }
}
