<?php

namespace App\Http\Controllers;

use App\Lectures;
use App\QA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //middleware function
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin(){
        return view('administration');
    }

    public function index()
    {
        //
        $lecturers=Lectures::all();
        $number=1;
        return view('administration/lecturers.index')->with(compact('lecturers','number'));
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
    public function addLect(){
        return view('administration/lecturers.add');
    }
    public  function deleteLect(){
        $lecturers=Lectures::all();
        $number=1;
        return view('administration/lecturers.delete')->with(compact('lecturers','number'));
    }
    public function view_performance(){
//        $performance=QA::orderBy('created_at','desc')->paginate(10);
        $number=1;
        $performance=DB::table('q_as')
            ->select('q_as.*','lectures.name as lecturer_name','units.*','q_as.created_at as evaluation_date')
            ->join('lectures',function ($join){
                $join->on('lectures.lect_number','=','q_as.lect_id');
            })
            ->join('units',function ($join){
                $join->on('q_as.unit_code','=','units.unit_code');
            })
            ->orderBy('q_as.created_at','desc')
            ->paginate(10);
        return view('administration.lecturers.view_performance',compact('performance','number'));
    }
}
