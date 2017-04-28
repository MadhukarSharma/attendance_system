<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FeatureRequest;
use Illuminate\Support\Facades\Input;
use App\Feature;
class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feature = Feature::all();
        return view('admin.features.index')->withfeatures($feature);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request)
    {
        $data = $request->only('title','description','logo');
        // dd($data);
        if($request->hasfile('logo'))
        {
            $destinationPath = Public_path('uploads/feature_logo/');

            $extension = Input::file('logo')->getClientOriginalExtension();

            $imagename = rand(11111,99999). '.' .$extension;
            
            $image = $imagename;

            $request->file('logo')->move($destinationPath, $image);

            $imagepath = 'uploads/feature_logo/';
        }

        $feature_data = array(

            'title'                 => $request->title,
            'description'           => $request->description,
            'logo'          => $imagepath . $image,

            );

        $feature = Feature::create($feature_data);

        return redirect()->route('feature.index');

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
         $feature = Feature::findorfail($id);
        // return view('admin.feature.edit',compact('feature'));
        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, $id)
    {
         $data = $request->only('title','description');
        // dd($data);
        Feature::where('feature_id', $id)->update($data);
        return redirect()->route('feature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $feature = Feature::findorfail($id);
        $feature->delete();
        
        return redirect()->route('feature.index');
    }
}
