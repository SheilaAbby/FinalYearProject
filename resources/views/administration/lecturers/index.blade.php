@extends('layouts.admin')
@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                N0:
            </th>
            <th>
                Profile Image
            </th>
            <th>
                Lecturer No:
            </th>
            <th>
                Name
            </th>
            <th></th>
            <th></th>

        </tr>
        </thead>
    <tbody>
    @foreach($lecturers as $lecture)
    <tr>
        <td>{{$number++}}</td>
        <td><img src="{{asset('/images/default.jpg')}}" style="height: 40px; width: 40px; border-radius: 50%" ></td>
        <td>{{$lecture->lect_number}}</td>
        <td>{{$lecture->name}}</td>
        <td><a href='{{url("/edit/update/{$lecture->id}")}}' class="btn btn-success"
            onclick="return confirm('Edit {{$lecture->name}} information ?')"
            >Edit</a> </td>
        <td><a href='{{url("/delete/{$lecture->id}")}}' class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete {{$lecture->name}} ?. This action cannot be undone.')"
            >Delete</a> </td>

    </tr>
        @endforeach
    </tbody>
    </table>


@endsection