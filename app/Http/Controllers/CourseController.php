<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Course;
use Illuminate\Support\Facades\Input;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
        return view('admin.course.index')->withcourses($course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        // $course_data = $request->all();
        // dd($course_data);
          if($request->hasfile('image'))
        {
            $destinationPath = Public_path('uploads/course_images/');

            $extension = Input::file('image')->getClientOriginalExtension();

            $imagename = rand(11111,99999). '.' .$extension;
            
            $image = $imagename;

            $request->file('image')->move($destinationPath, $image);

            $imagepath = 'uploads/course_images/';
  
}
        $course_data = array(

            'title'                 => $request->title,
            'course_name'           => $request->course_name,
            'description'           => $request->description,
            'status'                => $request->status,
            'image'                 => $imagepath . $image,

            );

        $course = Course::create($course_data);

        return redirect()->route('course.index');



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
        $course = Course::findorfail($id);
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course_data = $request->only('course_name', 'title', 'description', 'status');
        Course::where('course_id', $id)->update($course_data);

        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course_data = Course::findorfail($id);
        $course_data->delete();
        return redirect()->route('course.index');
    }
}
