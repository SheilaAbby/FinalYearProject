<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Current;
use App\Evaluation;
use App\Lecture_unit;
use App\Lectures;
use App\Units;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lect_id)
    {
        //
//        dd($unit_code);
//        exit();
//        $unit_code=Units::where('unit_code',$unit_code)->first();
        $lecturer=Current::where('id',$lect_id)->first();
         $assessed=Evaluation::where('lect_id',$lecturer->lecture_number)
             ->where('user_id',Auth::id())
             ->where('lect_id',$lecturer->id)
             ->exists();
        if ($assessed==true){
            flash('Sorry '.Auth::user()->name.'You already assessed this lecturer')->error();
            return back();
        }
        $lecturer=Lectures::where('lect_number',$lecturer->lecture_number)->first();
        return view('administration/lecturers.assess')->with(compact('lecturer'));
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
    public function store(Request $request,$id)

    {
       $lecturer=Lectures::where('id',$id)->first();

       $presentation=($request->input('presentation') +$request->input('presentation1')+$request->input('presentation2')
       +$request->input('presentation3')+$request->input('presentation4')+$request->input('presentation5')
           +$request->input('presentation6')+$request->input('presentation7')+$request->input('presentation8'))/45;

       $subject_matter=($request->input('presentation9') +$request->input('presentation10')+$request->input('presentation11')
               +$request->input('presentation13')+$request->input('presentation14')+$request->input('presentation15')
               +$request->input('presentation16')+$request->input('presentation17')+$request->input('presentation18'))/45;
        $personal_attritubes=($request->input('presentation19') +$request->input('presentation20')+$request->input('presentation21')
                +$request->input('presentation22')+$request->input('presentation23')+$request->input('presentation24')
                +$request->input('presentation25'))/35;
        $A=$request->input('comments');
        $B=$request->input('comments1');
        $C=$request->input('comments2');
        $score=((($presentation+$personal_attritubes+$subject_matter)/3) * 100);

        $unit_code=Lecture_unit::where('lecturer_number',$lecturer->lect_number)->first();
        $evaluation=new Evaluation();
        $evaluation->user_id=Auth::user()->id;
        $evaluation->u_code=$unit_code->unit_cod;
        $evaluation->lect_id=$lecturer->id;
        $evaluation->presentation=$presentation;
        $evaluation->subject_matter=$subject_matter;
        $evaluation->personal_attributes=$personal_attritubes;
        $evaluation->score=$score;
        $evaluation->save();
        $comments=new Comments();
        $comments->A=$A;
        $comments->B=$B;
        $comments->user_id=Auth::user()->id;
        $comments->unit_c=$unit_code->unit_cod;
        $comments->lect_id=$lecturer->id;
        $comments->C=$C;
        if($comments->save()){

            $number=1;
            $regno=Auth::user()->reg_no;
            $regno1=DB::select('select * from students where reg_number=?',[$regno]);
            $getUnits=DB::table('units')
                ->select('units.name as unit_name','units.unit_code','lectures.name','currents.lecture_number','currents.id')
                ->join('students',function ($join){
                    $join->on('students.year', '=', 'units.year');
                    $join->on('students.semester','=','units.semester');

                })

                ->join('currents',function ($join){
                    $join->on('currents.u_code', '=', 'units.unit_code');
                })
                ->join('lectures',function($join){
                    $join->on('lectures.lect_number','=','currents.lecture_number');
                })
                ->where('students.reg_number','=',$regno1[0]->reg_number)
                ->get();
            $assessed=Evaluation::where('user_id',Auth::user()->id)->where('u_code',$unit_code->unit_cod)->first();
            flash('You Successfully Assessed the Lecturer')->success();
            return view('/home')->with(compact('getUnits','number','assessed'));


        }


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
