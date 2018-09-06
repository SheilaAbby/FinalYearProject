<?php

namespace App\Http\Controllers;

use App\Courses;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('administration/courses.add');
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
    public function store(Request $request,Courses $course)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:courses',
            'course_code' => 'required|string|max:10|unique:courses',
        ]);
        //
        $course->name=$request->input('name');
        $course->course_code=$request->input('course_code');

        if($course->save()){
            flash('Successfully added course information')->success();
            return view('administration/courses.index');

        }
        return back()->withInput();
        //flash('couldnot add the information successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
        $courses=Courses::all();
        $number=1;
        return view('administration/courses.index',compact('courses','number'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $courses)
    {
        //
    }
}
