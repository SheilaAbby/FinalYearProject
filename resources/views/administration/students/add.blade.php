@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div class="container">
        <div class="row">

            <form method="POST" action="{{ url('/saveStudent') }}">
                @csrf

                <div class="form-group row">
                    <label for="name">Name<span class="required" style="color: red">*</span> </label>
                    <input placeholder="Name" id="name" required name="name" spellcheck="false" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  />
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>


                <div class="form-group row">
                    <label for="reg_number">Reg No:<span class="required" style="color: red">*</span> </label>
                    <input placeholder="Reg No" id="reg_number" required name="reg_number" spellcheck="false" class="form-control{{ $errors->has('reg_number') ? ' is-invalid' : '' }}"  />
                    @if ($errors->has('reg_number'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('reg_number') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="Course">Course<span class="required" style="color: red">*</span> </label>
                    <select id="Course" required name="c_code" spellcheck="false" class="form-control{{ $errors->has('c_code') ? ' is-invalid' : '' }}"  >
                    <option>---Select Course---</option>
                        @foreach($courses as $course)
                        <option value="{{$course->course_code}}">{{$course->name}}</option>
                            @endforeach
                    </select>
                        @if ($errors->has('c_code'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('c_code') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="year">Year Of Study<span class="required" style="color: red">*</span> </label>
                    <select id="year" required name="year" spellcheck="false" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}"  >
                        <option>---Select Year of Study---</option>
                        <option value="1">Year 1</option>
                        <option value="2">Year 2</option>
                        <option value="3">Year 3</option>
                        <option value="4">Year 4</option>


                    </select>
                    @if ($errors->has('year'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="semester">Semester<span class="required" style="color: red">*</span> </label>
                    <select id="semester" required name="semester" spellcheck="false" class="form-control{{ $errors->has('semester') ? ' is-invalid' : '' }}"  >
                        <option>---Select Semester---</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>



                    </select>
                    @if ($errors->has('semester'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary btn-lg" >Submit</button>
                </div>
            </form>

        </div>
    </div>
    @endsection