<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Current;
use App\Lecture_unit;
use App\Lectures;
use App\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses=Courses::orderBy('name','asc')->get();
        return view('administration.units.add',compact('courses'));
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

        $validatedData = request()->validate([
            'name' => 'string|min:4|max:255|required',
            'unit_code' => 'string|min:4|max:10|required|unique:units',
            'CF'=>'required|min:1.5|max:5.0',
            'c_code'=>'required',
            'year'=>'required|integer|min:1',
            'semester'=>'integer|min:1|max:3'
        ]);
        if ($validatedData){
            $saved_unit=Units::create([
                'name'=>$request->input('name'),
                'unit_code'=>$request->input('unit_code'),
                'CF'=>$request->input('CF'),
                'c_code'=>$request->input('c_code'),
                'year'=>$request->input('year'),
                'semester'=>$request->input('semester'),
            ]);
            if ($saved_unit){
                flash('Unit successfully added!')->success();
                return redirect()->back();
            }
            flash('An error occurred while trying to add unit information! Please try again')->error();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $units=Units::orderBy('name','asc')->paginate(10);
        $number=1;
        $unit_exist=Units::all();
        return view('administration.units.show',compact('units','number'));
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
    public function allocate_lecturers($id){
        $number=1;
      $unit=Units::where('id',$id)->first();
      $lecture_units=Lecture_unit::where('unit_cod',$unit->unit_code)->first();
//      $lecturer=Lectures::where('lect_number',$lecture_units->lecturer_number)->paginate(3);
        $lecturer=DB::table('lecture_units')
          ->select('lecture_units.lecturer_number','lectures.name','lectures.id')
          ->join('lectures',function ($join){
              $join->on('lecture_units.lecturer_number','=','lectures.lect_number');
          })
          ->where('lecture_units.unit_cod','=',$unit->unit_code)
          ->paginate(3);
      $lecturer_list=Lectures::all();
      return view('administration.units.allocate',compact('unit','lecture_units','number','lecturer','lecturer_list'));
    }
    public function allocate_to_lecturers(Request $request){
        $validatedData = request()->validate([
            'lecturer' => 'required',
            'unit_cod'=>'required',

        ]);
        if ($validatedData){
            $check_existence=Lecture_unit::where('lecturer_number',$request->input('lecturer'))
                ->where('unit_cod',$request->input('unit_cod'))
                ->exists();
            if ($check_existence==true){
                flash('Sorry the lecturer has already been allocated the same unit!. Unallocate first to allocate again.')->error();
                return redirect()->back();
            }
            $allocate=Lecture_unit::create([
               'lecturer_number'=>$request->input('lecturer'),
                'unit_cod'=>$request->input('unit_cod'),
            ]);
            if($allocate){
                flash('Lecturer successfully allocated to the unit')->success();
                return redirect()->back();
            }
            flash('An error occcurred while trying to allocate lecturer to the unit! Please try again')->error();
            return redirect()->back();
        }

    }
    public function unallocate_lecturers($id,$unit_id){
       $unit=Units::where('id',$unit_id)->first();
        $lecturer=Lectures::where('id',$id)->first();
        $assigned_unit=Lecture_unit::where('lecturer_number',$lecturer->lect_number)->first();
        $check_current=Current::where('lecture_number',$lecturer->lect_number)
            ->where('u_code',$unit->unit_code)->first();
        if ($check_current!=null){
            $check_current->delete();
            $assigned_unit->delete();
            flash('Lecturer successfully unallocated from the unit. Lecturer has also been unallocated the unit he/she is lecturing')->success();
            return redirect()->back();
        }elseif ($assigned_unit->delete()){
            flash('Lecturer successfully unallocated from the unit.')->success();
            return redirect()->back();
        }else{
            flash('An error occurred while trying to unallocate the lecturer! Please try again')->error();
            return redirect()->back();
        }


    }

    public function view_allocations($id){
        $number=1;
        $unit=Units::where('id',$id)->first();
        $lecture_units=Lecture_unit::where('unit_cod',$unit->unit_code)->first();
//      $lecturer=Lectures::where('lect_number',$lecture_units->lecturer_number)->paginate(3);
        $lecturer=DB::table('lecture_units')
            ->select('lecture_units.lecturer_number','lectures.name','lectures.id')
            ->join('lectures',function ($join){
                $join->on('lecture_units.lecturer_number','=','lectures.lect_number');
            })
            ->where('lecture_units.unit_cod','=',$unit->unit_code)
            ->paginate(3);
        $lecturer_list=Lectures::all();
        return view('administration.units.view_allocated',compact('lecture_units','unit','lecturer_list','lecturer','number'));

    }

    public function destroy($id)
    {
        //
    }
    public  function addtocurrents($lect_id,$id){
        $lecture=Lectures::where('id',$lect_id)->first();
        $unit_code=Units::where('id',$id)->first();
        $exist=Current::where('u_code',$unit_code->unit_code)->exists();
        $exist1=Current::where('lecture_number',$lecture->lect_number);
        if($exist && $exist1){
            flash('already assigned')->error();
            return redirect()->back();
        }else{
            $current=new Current();
            $current->u_code=$unit_code->unit_code;
            $current->lecture_number=$lecture->lect_number;
            $current->save();
            flash('Lecturer added to currents in charge')->success();
            return redirect()->back();
        }



    }
}
