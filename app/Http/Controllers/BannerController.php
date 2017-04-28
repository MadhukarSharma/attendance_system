<?php

namespace App\Http\Controllers;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Facades\Input;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $banner = Banner::all();
        return view('admin.banner.index')->withbanners($banner);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {

       if($request->hasfile('banner_image'))
        {
            $destinationPath = Public_path('uploads/banner_images/');

            $extension = Input::file('banner_image')->getClientOriginalExtension();

            $imagename = rand(11111,99999). '.' .$extension;
            
            $image = $imagename;

            $request->file('banner_image')->move($destinationPath, $image);

            $imagepath = 'uploads/banner_images/';
        }

        $banner_data = array(

            'title'                 => $request->title,
            'heading'               => $request->heading,
            'description'           => $request->description,
            'banner_image'          => $imagepath . $image,

            );

        $banner = Banner::create($banner_data);

        return redirect()->route('banner.index');

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
        $banner = Banner::findorfail($id);
        return view('admin.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $data = $request->only('title','description','heading');
        // dd($data);
        Banner::where('banner_id', $id)->update($data);
        return redirect()->route('banner.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findorfail($id);
        $banner->delete();
        
        return redirect()->route('banner.index');
        // dd($banner);
    }
}
