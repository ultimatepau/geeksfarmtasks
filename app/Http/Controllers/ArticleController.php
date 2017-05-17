<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = \App\Article::paginate(10);
        return view('home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            "title" => "required|max:30",
            "content" => "required"
        ];

        $this->validate($request,$rules);

        $input = $request->all();

        $status = \App\Article::create($input);
        if ($status) return redirect('Article/create')->with('success','Article Created!');
        else return redirect('/Article/create')->with('error','Create Article Failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['comments'] = \App\Article::find($id)->comments;
        $data['result'] = \App\Article::where('id',$id)->first();
        return view('detail')->with($data);
    }

    public function download($id)
    {   

        $data = \App\Article::select('title','content')->where('id',$id)->get()->toArray();
        return Excel::create('test',function($excel) use($data) {
            $excel->sheet('Article',function($sheet) use($data)  
            {
                $sheet->with($data);
            });
        })->export('xlsx');
    }

    public function upload(Request $request)
    {
        $rules = [
            "excel" => "required|mimes:xlsx|max:2000"
        ];
        $this->validate($request, $rules);

        if($request->hasFile('excel')) {
            $filename = $request->file('excel')->getClientOriginalName();
            $angka = str_random(10);
            $request->file('excel')->move('uploads',$angka.$filename);
            $path = 'public\uploads/'.$angka.$filename;
            $data = Excel::load($path,function($reader){

            })->get();
            if(!empty($data)) {
                foreach($data as $value)
                {
                    $datax['title'] = $value->title;
                    $datax['content'] = $value->content;
                    \App\Article::create($datax);
                }
            }
        }
        return redirect('Article/create')->with('success','Upload Success, Article was created.');

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
    }
}
