@extends('layouts.admin')
@section('content')
    <style>
        .table thead th{
            font-weight: bold;
        }
    </style>
<h4 class="text-center" style="font-weight: bold">Performance per unit</h4>
    <table class="table table-bordered table-hover">
    <thead>
    <th>No.</th>
    <th>Lecturer Name</th>
    <th>Unit Code</th>
    <th>Course Code</th>
    <th>Score</th>
    <th>Date of Evaluation</th>
    <th>QA Comments</th>
    </thead>
        <tbody>
        @foreach($performance as $score_performance)
            <tr>
                <td>{{$number++}}</td>
                <td>{{$score_performance->lecturer_name}} <br>({{$score_performance->lect_id}})</td>
                <td>{{$score_performance->unit_code}}</td>
                <td>{{$score_performance->c_code}}</td>
                <td>{{sprintf('%0.2f',$score_performance->score)}}</td>
                <td>{{$score_performance->evaluation_date}}</td>
                <td>{{$score_performance->comments}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $performance->links() !!}
    @endsection