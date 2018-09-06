<?php

namespace App\Http\Controllers;
use App\Current;
use App\Lecture_unit;
use App\QA;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Session;
use App\Lectures;
use Illuminate\Http\Request;

class LecturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home(){
        $assessment=QA::where('lect_id',Auth::user()->reg_no)->get();
        return view('lecturers.index',compact('assessment'));
    }
    public function index()
    {
        //

        $lecturers=Lectures::all();
        $number=1;
        flash('Welcome to Admin Panel')->success();
        return view('administration/lecturers.index')->with(compact('lecturers','number'));
    }
    public function index1()
    {
        //
        $lecturers=Lectures::all();
        $number=1;
        return view('administration/lecturers.edit')->with(compact('lecturers','number'));
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
    public function store(Request $request,Lectures $lecture)
    {

        //$lecture=new Lectures();
        $lecture->name=$request->input('name');
        $lecture->lect_number=$request->input('lect_number');
        $user_type='lecturer';

        if($lecture->save()){
            User::create([
               'name'=>$request->input('name'),
                'reg_no'=>$request->input('lect_number'),
                'user_type'=>$user_type,
                'password'=>Hash::make($request->input('lect_number')),
            ]);
            User::where('reg_no',$request->input('lect_number'))
                ->update([
                    'user_type'=>$user_type,
                ]);
            flash('Successfully added lecturer information')->success();
           return view('administration/lecturers.add');

        }
        return back()->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function show(Lectures $lectures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer=Lectures::find($id);

        return view('administration/lecturers.update')->with(compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $lecturer=Lectures::where('id',$id)->first();
        $check_current=Current::where('lecture_number',$lecturer->lect_number)->first();
        $check_lecture_unit=Lecture_unit::where('lecturer_number',$lecturer->lect_number)->first();
        if ($check_current->exists() && $check_lecture_unit->exists()){
            $check_lecture_unit->update([
                'lecturer_number'=>$request->input('lect_number')
            ]);
            $check_current->update([
                'lecture_number'=>$request->input('lect_number')
            ]);
            flash('Successfully updated lecturer profile')->success();
            return back();
        }elseif ($check_current->exists()){
            $check_current->update([
                'lecture_number'=>$request->input('lect_number')
            ]);
                 flash('Successfully updated lecturer profile')->success();
            return back();
        }
        elseif ($check_lecture_unit->exists()){
            $check_lecture_unit->update([
                'lecturer_number'=>$request->input('lect_number')
            ]);
            flash('Successfully updated lecturer profile')->success();
            return back();
        }
       $lecturer=Lectures::where('id',$id);
        $lecturer->update([
           'name'=>$request->input('name'),
            'lect_number'=>$request->input('lect_number')
        ]);

        $lecturers=Lectures::all();
        $number=1;
        return view('administration/lecturers.index')->with(compact('lecturers','number'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer=Lectures::where('id',$id)->first();
        $check_current=Current::where('lecture_number',$lecturer->lect_number)->first();
        $check_lecture_unit=Lecture_unit::where('lecturer_number',$lecturer->lect_number)->first();
        if ($check_current->exists() || $check_lecture_unit->exists()){
            $check_lecture_unit->delete();
            $check_current->delete();

            $lecturer->delete();
            flash('Lecturer successfully deleted and unassigned from the unit list')->success();
            return back();
        }
        $lecturer->delete();
        flash('Lecturer successfully deleted from the lecturer list')->success();
        return redirect()->back();
    }

}
