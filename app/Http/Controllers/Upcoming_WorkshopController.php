<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WorkshopRequest;
use Illuminate\Support\Facades\Input;
use App\Upcoming_Workshop;
class Upcoming_WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshop = Upcoming_Workshop::all();
        // return view('admin.workshop.index')->withworkshops($workshop);
        return view('admin.workshop.index')->withworkshops($workshop);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workshop.create');
        // return ('view aayena mula');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(workshopRequest $request)
    {
        // $data = $request->all();
        // dd($data);

          $data = $request->only('title','description','name');
        // dd($data);
        if($request->hasfile('image'))
        {
            $destinationPath = Public_path('uploads/workshop_image/');

            $extension = Input::file('image')->getClientOriginalExtension();

            $imagename = rand(11111,99999). '.' .$extension;
            
            $image = $imagename;

            $request->file('image')->move($destinationPath, $image);

            $imagepath = 'uploads/workshop_image/';
        }

        $data = array(

            'title'                 => $request->title,
            'description'           => $request->description,
            'image'                 => $imagepath . $image,

            );

        $workshop = Upcoming_Workshop::create($data);

        // return 'records successfully added';
        return redirect()->route('workshop.index');
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
        $workshop = Upcoming_Workshop::findorfail($id);
        return view('admin.workshop.edit',compact('workshop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkshopRequest $request, $id)
    {
        $data = $request->only('title','description');
        // dd($data);
        Upcoming_Workshop::where('workshop_id', $id)->update($data);
        return redirect()->route('workshop.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workshop = Upcoming_Workshop::findorfail($id);
        $workshop->delete();
        
        return redirect()->route('workshop.index');
    }
}
