<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Media;
use App\Album;
use App\Tag;
use Storage;
use File;
use Response;
use Image;
use Session;

if(defined('DS')){

}else {
    define('DS', DIRECTORY_SEPARATOR);
}

//todo
// add slugs
// add carbon for dates

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $media = Media::orderBy('created_at', 'desc')->paginate(5);
        $tags = Tag::all();
        return view('media.show')->withMedia($media)->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id = null)
    {
        // fetch all existing album ids and titles
        $albums = Album::all();
        $tags = Tag::all();
        // refactor
        return view('media.create')->withAlbums($albums)->withSelectedalbum(Album::find($album_id))->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vals = ['media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
         'category' => 'required', 
          'caption' => 'required|max:191',
          'slug' => 'required|alpha_dash|max:191|min:5|unique:media,slug'];
        $this->validate($request, $vals);

        $path = strtolower($request->slug) . '.' . $request->media->getClientOriginalExtension();
        // $request->media->move(public_path('uploads'), $path);

        // create thumbnail
        $io = $do = Image::make($request->media);
        $do->fit(240,157)->save(public_path('uploads' . DS. 'thumbnails'. DS) . $path);

        // // watermark
        // Image::make($request->media)->insert(public_path('owner'. DS. 'cre8tvs oficial logo.png'), 'top-left')->save(public_path('uploads'. DS) . $path);
        Image::make($request->media)->save(public_path('uploads' . DS) . $path);


        $media = new Media;
        $media->slug = $request->slug;
        $media->caption = $request->caption;
        $media->url = $path;
        $media->description = $request->description;
        $media->visibility = $request->visibility;
        $media->category = $request->category;
        if($request->album){
            $media->album_id = $request->album;
        }
        $media->save();
        $media->tags()->sync($request->tags, false);
        return redirect()->route('media.single.show', $media->id)->with('success','Media Uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Media::findOrFail($id);
        return view('media.single')->withMedia($media);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $media = Media::findOrFail($id);
        $albums = Album::all();
        $tags = Tag::all();
        return view('media.edit')->withMedia($media)->withAlbums($albums)->withTags($tags);
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
        $media = Media::find($id);        
        $vals = ['slug' => 'required|alpha_dash|max:191|min:5|unique:media.slug',
         'category' => 'required',
          'caption' => 'required|max:191'
          ];

        if($request->slug == $media->slug){
          $this->validate($request,[
         'category' => 'required',
          'caption' => 'required|max:191'
          ]);
        }else{
          $this->validate($request,$vals);
        }

        $media->slug = $request->slug;
        $media->category = $request->category;
        $media->caption = $request->caption;
        $media->description = $request->description;
        $media->visibility = $request->visibility;
        $media->album_id = $request->album == "" ? null : $request->album;
        $media->update();
        $media->tags()->sync(isset($request->tags) ? $request->tags : [], true);
        return redirect()->route('media.single.show', $media->id)->with('success','Media updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $media  = Media::find($id);
        $media->tags()->detach();
        $media->delete();
        unlink(public_path('uploads/' . $request->input('file_url') ));
        unlink(public_path('uploads/thumbnails/' . $request->input('file_url')));
        Session::flash('success','The media was deleted successfully!');
        return redirect()->route('media.all');
    }

    public function getMedia($filename){
        $path = storage_path('app/public/uploads/'. $filename);
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', $type);
        return $response;
    }
}
