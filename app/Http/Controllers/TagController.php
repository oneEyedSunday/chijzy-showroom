<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validate request
        $this->validate($request, [
          'name'=> 'required|max:191|unique:tags'
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        //flash Message
        Session::flash('success', 'New Tag has been created');

        return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tag = Tag::find($id);
        return view('tags.show')->withTag($tag);
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
        $tag = Tag::find($id);
        return view('tags.edit')->withTag($tag);
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
        //
         $tag = Tag::find($id);
         $this->validate($request,[
           'name' => 'required|max:191|unique:tags'
         ]);
         $former = $tag->name;
         $tag->name = $request->name;
         $tag->save();
         Session::flash('success', "Successfully updated tag {$former}, now {$tag->name}");
        return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tag = Tag::find($id);
        $former = $tag->name;
        $tag->media()->detach();
        $tag->delete();
        Session::flash('success', "Tag {$former} was deleted successfully");
        return redirect()->route('tags.all');
    }
}
