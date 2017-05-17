<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = \App\Article::all();
        return view('article')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'foto' =>'required|mimes:jpeg,png,jpg|max:200',
            'author' => ''
        ];

        $this->validate($request, $rules);

        $input = $request->all();

        if($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $filename = $request->file('foto')->getClientOriginalName();

            $request->file('foto')->move('uploads', $filename);

            $img = Image::make(base_path() . '/public/uploads/' .$filename);

            $img->resize(200,100);
            $dest = base_path() . '/public/uploads/thumb/';
            $img->save($dest.$filename);

            $img = Image::make(base_path() . '/public/uploads/' .$filename);

            $img->resize(600,300);
            $dest = base_path() . '/public/uploads/cropped/';
            $img->save($dest.$filename);            

            $input['path'] = $filename;
            $input['author'] = "mantap";
        }

        $status = \App\Article::create($input);

        if($status) return redirect('/')->with('success','Image Uploaded !');
        else return redirect('/')->with('error','Upload failed');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['result'] = \App\Article::where('id',$id)->first();
        return view('article_edit')->with($data);
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
        $rules = [
            'title' => 'required',
            'foto' =>'required|mimes:jpeg,png,jpg|max:200',
            'author' => ''
        ];

        $this->validate($request, $rules);

        $input = $request->all();
        $result  = \App\Article::where('id',$id)->first();

        if($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('uploads', $filename);

            $img = Image::make(base_path() . '/public/uploads/' .$filename);

            $img->resize(200,100);
            $dest = base_path() . '/public/uploads/thumb/';
            $img->save($dest.$filename);

            $img = Image::make(base_path() . '/public/uploads/' .$filename);

            $img->resize(600,300);
            $dest = base_path() . '/public/uploads/cropped/';
            $img->save($dest.$filename);            


            $input['path'] = $filename;
            $input['author'] = "mantap";
        }

        $status = $result->update($input);

        if($status) return redirect('/')->with('success','Image Updated !');
        else return redirect('/')->with('error','Update failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = \App\Article::where('id',$id)->first();
        $status = $result->delete();

        return redirect('/');
    }
}
