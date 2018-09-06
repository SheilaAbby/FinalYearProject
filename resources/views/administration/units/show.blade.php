@extends('layouts.admin')
@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                N0:
            </th>
            <th>
                Unit Name
            </th>
            <th>
               Unit Code
            </th>
            <th>CF</th>
            <th>Year/Semester Offered</th>
            <th>Allocate Lecturers</th>
            <th>View Allocations</th>

        </tr>
        </thead>
        <tbody>
        @foreach($units as $unit)
            <tr>
                <td>{{$number++}}</td>
                <td>{{$unit->name}}</td>
                <td>{{$unit->unit_code}}</td>
                <td>{{$unit->CF}}</td>
                <td>YR: {{$unit->year}} SEM:{{$unit->semester}}</td>
                <td><a href='{{url("/admin/allocate/{$unit->id}")}}' class="btn btn-secondary">+ Allocate</a> </td>
                <td><a href='{{url("/admin/allocations/{$unit->id}")}}' class="btn btn-secondary">Allocated</a> </td>
                <td><a href='{{url("/edit/update/{$unit->id}")}}' class="btn btn-success"
                       onclick="return confirm('Edit {{$unit->name}} information ?')"
                    >Edit</a> </td>
                <td><a href='{{url("/delete/{$unit->id}")}}' class="btn btn-danger"
                       onclick="return confirm('Are you sure you want to delete {{$unit->name}} ?. This action cannot be undone.')"
                    >Delete</a> </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$units->links()}}

@endsection