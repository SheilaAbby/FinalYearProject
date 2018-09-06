<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\Lectures;
use App\QA;
use App\Students;
use App\Units;
use Illuminate\Http\Request;
use DB;

class QAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assessed=DB::table('lectures')
            ->select('lectures.*','evaluations.*')
            ->join('evaluations',function ($join){
                $join->on('lectures.id', '=', 'evaluations.lect_id');

            })
            ->distinct('lectures.lect_name')
            ->get();

        return view('QA.index',compact('assessed'));
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
    public function store(Request $request)
    {
        //
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
    public  function allunits($id){
        $lecture=Lectures::where('id',$id)->first();
        $assessed=DB::table('evaluations')
            ->select('units.*','units.name as unit_name','courses.*','evaluations.id')
            ->join('units',function ($join){
                $join->on('units.unit_code', '=', 'evaluations.u_code');

            })
            ->join('courses',function ($join){
                $join->on('units.c_code', '=', 'courses.course_code');

            })
            ->where('evaluations.lect_id',$id )
            ->get();
        return view('QA.assessed',compact('assessed'));

    }
    public function view_score($evaluation_id){
        $unit=Evaluation::where('id',$evaluation_id)->first();
        $comment=QA::where('unit_code',$unit->u_code)->first();
        $find_unit=Units::where('unit_code',$unit->u_code)->first();
        $assessor_students=Evaluation::where('u_code',$unit->u_code)->count();
        $find_student_no=Students::where('year',$find_unit->year)
            ->where('semester',$find_unit->semester)
            ->where('c_code',$find_unit->c_code)
            ->count();
        $half_student=($find_student_no/2);
        $unit_count=Evaluation::where('u_code',$unit->u_code)->count();
        if ($unit_count>=$half_student){
            $presentation_score=(($unit->presentation)/$assessor_students);
            $subject_matter=(($unit->subject_matter)/$assessor_students);
            $personal_attributes=(($unit->personal_attributes)/$assessor_students);
            $lecturer=Lectures::where('id',$unit->lect_id)->first();
            $lecture_unit=$find_unit->unit_code;
            $check_assessed=QA::where('unit_code',$unit->u_code)->exists();
            $average_score=((($presentation_score+$subject_matter+$personal_attributes)/3)*100);
            if ($check_assessed==false){
                QA::create([
                    'lect_id'=>$lecturer->lect_number,
                    'unit_code'=>$unit->u_code,
                    'stud_count'=>$assessor_students,
                    'score'=>$average_score,
                ]);
                return view('QA.score',compact('lecturer','lecture_unit','unit','presentation_score',
                    'subject_matter','personal_attributes','evaluation_id'));
            }else{
                return view('QA.score',compact('lecturer','lecture_unit','unit','presentation_score',
                    'subject_matter','personal_attributes','evaluation_id','comment'));
            }

        }
        flash('<strong class="text-center">Unit has not been assessed by at least half of the students of the class.</strong>')->error()->important();
        return back();


    }
    public function add_comment(Request $request,$evaluation_id){
        $find_unit=Evaluation::where('id',$evaluation_id)->first();
        $add_comment=QA::where('unit_code',$find_unit->u_code)
        ->update([
            'comments'=>$request->input('comment'),
        ]);
        if ($add_comment){
            flash('Comment added successfully')->success();
            return redirect()->back();
        }
        flash('An error occurred while trying to add a comment! Please try again')->error();
        return redirect()->back();
    }
}
