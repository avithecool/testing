<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Files;
class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $file = new Files();
        $files = $file->where('id','>','0')->paginate(10);
        return view('manager.files.index',compact('files',$files));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manager.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //test
        $attr = array(
                        'title'=>'required',
                        'description'=>'required',
                        'price'=>'required',
                        'state'=>'required',
                        'version'=>'required'

                    );

        $data = $request->validate($attr);

        $file     = $request->file('image');
         if(!$request->hasFile('image'))
         return back()->withInput()->with('error_msg','Image not Uploaded');
         if (!$request->hasFile('filename'))
         return back()->withInput()->with('error_msg','Extension not Uploaded');


        $file     = $request->file('image');
         $imagepath= Storage::disk('public')->putFile('image', $file);
        $file     = $request->file('filename');

        $extpath= Storage::disk('local')->putFile('extension', $file);
        $data['image']=$imagepath;
        $data['filename'] = $extpath;
        Files::create($data);
        return redirect('manager/files');
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
        //
        $file =Files::findorfail($id);
        return view('manager.files.edit',compact('file',$file));
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
    public function destroy( $id)
    {
        //
        Files::destroy($id);
        return redirect('manager/files')->with('message','File Deleted');
    }
}
