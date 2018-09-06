@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="card card-default col-md-12" style="padding: 0">
            <div class="card-header text-center">
                Lecturers currently assigned to {{$unit->unit_code}}
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>
                            N0:
                        </th>
                        <th>
                            Lecturer Name
                        </th>
                        <th>
                            Lecturer No
                        </th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lecturer as $lecture)
                        <tr>
                            <td>{{$number++}}</td>
                            <td>{{$lecture->name}}</td>
                            <td>{{$lecture->lecturer_number}}</td>
                            <td><a href='{{url("/admin/unallocate/{$lecture->id}/{$unit->id}")}}' class="btn btn-danger"
                                   onclick="return confirm('Are you sure you want to unallocate {{$lecture->name}} from {{$unit->unit_code}} ?')"
                                >Unallocate</a> </td>
                            <td><a href='{{url("/add_to_currents/{$lecture->id}/{$unit->id}")}}' class="btn btn-success">Assign</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$lecturer->links()}}
            </div>
        </div>
    </div>

@endsection