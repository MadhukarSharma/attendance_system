<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FacultyRequest;
use App\Faculty_member;
use Illuminate\Support\Facades\Input;
class Faculty_MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty_member = Faculty_member::all();
        return view('admin.faculty_member.index')->withfaculty_members($faculty_member);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculty_member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacultyRequest $request)
    {
        $data = $request->all();
        // dd($data);
        if($request->hasfile('member_image'))
        {
            $destinationPath = Public_path('uploads/Faculty_member_images/');

            $extension = Input::file('member_image')->getClientOriginalExtension();

            $imagename = rand(11111,99999). '.' .$extension;
            
            $image = $imagename;

            $request->file('member_image')->move($destinationPath, $image);

            $imagepath = 'uploads/Faculty_member_images/';
        }

        $member_data = array(

            'name_of_member'        => $request->name_of_member,
            'job_post'              => $request->job_post,
            'description'           => $request->description,
            'member_image'          => $imagepath . $image,

            );

        $member = Faculty_member::create($member_data);

        // return "success in data entry";
        return redirect()->route('faculty.index');

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
        $faculty_member = Faculty_member::findorfail($id);
        return view('admin.faculty_member.edit',compact('faculty_member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacultyRequest $request, $id)
    {
        $data = $request->only('name_of_member','description','job_post');
        // dd($data);
        Faculty_member::where('member_id', $id)->update($data);
        return redirect()->route('faculty.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty_member = Faculty_member::findorfail($id);
        $faculty_member->delete();
        return redirect()->route('faculty.index');
    }
}
