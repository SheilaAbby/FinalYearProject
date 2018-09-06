@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="card card-default col-md-12" style="padding: 0">
            @if($lecture_units==null)
                <div class="card-header text-center">
                    Assign Lecturer to {{$unit->unit_code}}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('allocate_lecturers')}}" enctype="multipart/form-data" class="col-md-10">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="lecturer">Lecturer Name<span class="required" style="color: red">*</span> </label>
                            <select id="lecturer" required name="lecturer" spellcheck="false" class="form-control{{ $errors->has('lecturer') ? ' is-invalid' : '' }}">
                                <option value="">---select lecturer---</option>
                                @foreach($lecturer_list as $lect)
                                    <option value="{{$lect->lect_number}}">{{$lect->name}}</option>
                                @endforeach

                                @if ($errors->has('lecturer'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lecturer') }}</strong>
                                    </span>
                                @endif
                            </select>
                        </div>
                        <input type="hidden" value="{{$unit->unit_code}}" name="unit_cod">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg col-md-12" value="Allocate +"/>
                        </div>
                    </form>
                </div>
                @else
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header text-center">
                        Assign More Lecturers to {{$unit->unit_code}}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('allocate_lecturers')}}" enctype="multipart/form-data" class="col-md-10">
                        {{csrf_field()}}

                            <div class="form-group">
                                <label for="lecturer">Lecturer Name<span class="required" style="color: red">*</span> </label>
                                <select id="lecturer" required name="lecturer" spellcheck="false" class="form-control{{ $errors->has('lecturer') ? ' is-invalid' : '' }}">
                                    <option value="">---select lecturer---</option>
                                    @foreach($lecturer_list as $lect)
                                        <option value="{{$lect->lect_number}}">{{$lect->name}}</option>
                                    @endforeach

                                    @if ($errors->has('lecturer'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lecturer') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                            <input type="hidden" value="{{$unit->unit_code}}" name="unit_cod">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg col-md-12" value="Allocate +"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-header text-center">
                        Lecturers currently assigned to the unit
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
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$lecturer->links()}}
                    </div>
                </div>

                @endif
        </div>
    </div>
    </div>


    @endsection