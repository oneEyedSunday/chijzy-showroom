<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Album;
use App\Tag;
use Session;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::orderBy('created_at', 'desc')->paginate(5);
        return view('album.show')->withAlbums($albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $t = Tag::all();
        return view('album.create')->withTags($t);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vals = ['title' => 'required',
         'cover_image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'];
        $this->validate($request, $vals);

        $path = '';
        $album = new Album;
        if($request->cover_image_url){
            $path = time().'.'.$request->cover_image_url->getClientOriginalExtension();
            $request->cover_image_url->move(public_path('uploads/album_covers'), $path);
            $album->cover_image_url = 'album_covers/' . $path;
        }
        $album->title = $request->title;
        $album->description = $request->description; 
        $album->save();
        $album->tags()->sync($request->tags, false);
        return redirect()->route('album.single.show', $album->id)->with('success','Album created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);
        return view('album.single')->withAlbum($album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $t = Tag::all();
        return view('album.edit')->withAlbum($album)->withTags($t);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vals = ['title' => 'required',
         'cover_image_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'];
        $this->validate($request, $vals);

        $album = Album::find($id);
        
        $album->title = $request->title;
        $album->description = $album->description;
        if($request->cover_image_url){
            $album->cover_image_url = $request->cover_image_url;
        }
        
        $album->update();
        $album->tags()->sync(isset($request->tags) ? $request->tags : [], true);
        return redirect()->route('album.single.show', $album->id)->with('success','Album updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // what happens when i delete an album? leave photos: YES
        // for all photos in album,
        // null their album ids
        $album  = Album::find($id);
        foreach ($album->media as $m) {
            # code...
            $m->album_id = null;
        }
        $album->tags()->detach();
        $album->delete();
        unlink(public_path('uploads/' . $album->cover_image_url));
        Session::flash('success','The album was deleted successfully!');
        //since im using ajax to send req.
        // return response(200);
        return redirect()->route('album.all');

    }
}
