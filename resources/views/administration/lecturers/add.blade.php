@extends('layouts.admin')
@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                N0:
            </th>
            <th>
                Course Name
            </th>
            <th>
                Course Code:
            </th>
            <th></th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{$number++}}</td>
                <td>{{$course->name}}</td>
                <td>{{$course->course_code}}</td>
                <td><a href='{{url("/edit/update/{$course->id}")}}' class="btn btn-success"
                       onclick="return confirm('Edit {{$course->name}} information ?')"
                    >Edit</a> </td>
                <td><a href='{{url("/delete/{$course->id}")}}' class="btn btn-danger"
                       onclick="return confirm('Are you sure you want to delete {{$course->name}} ?. This action cannot be undone.')"
                    >Delete</a> </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    @endsection