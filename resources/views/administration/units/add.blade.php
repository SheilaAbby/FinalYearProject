@extends('layouts.admin')
@section('content')
    <style>
        label{
            color: red;
        }

    </style>
    <form method="POST" action="{{route('save_unit')}}" enctype="multipart/form-data" class="col-md-10">
    {{csrf_field()}}

        <div class="row">
            <div class="col-md-6 left-side">
                <div class="form-group">
                    <label for="name">Unit Name<span class="required">*</span> </label>
                    <input placeholder="e.g Algorithm Analysis" id="name" required name="name" spellcheck="false" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Unit Code<span class="required">*</span> </label>
                    <input placeholder="e.g COMP 326" id="name" required name="unit_code" spellcheck="false" class="form-control{{ $errors->has('unit_code') ? ' is-invalid' : '' }}" />
                    @if ($errors->has('unit_code'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('unit_code') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="CF">Cumulative Frequency (C.F)<span class="required">*</span> </label>
                    <input placeholder="e.g 3.5" id="CF" required name="CF" spellcheck="false" class="form-control{{ $errors->has('CF') ? ' is-invalid' : '' }}" />
                    @if ($errors->has('CF'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('CF') }}</strong>
                                    </span>
                    @endif
                </div>



            </div>
            <div class="col-md-6 right-side">
                <div class="form-group">
                    <label for="name">Course<span class="required">*</span> </label>
                    <select id="name" required name="c_code" spellcheck="false" class="form-control{{ $errors->has('c_code') ? ' is-invalid' : '' }}">
                        <option value="">---select course---</option>
                        @foreach($courses as $course)
                            <option value="{{$course->course_code}}">{{$course->name}}</option>
                            @endforeach

                    @if ($errors->has('c_code'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('c_code') }}</strong>
                                    </span>
                    @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="year">Year<span class="required">*</span> </label>
                    <select id="year" required name="year" spellcheck="false" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}">
                        <option value="">---select year---</option>
                        <option value="1">One (1)</option>
                        <option value="2">Two (2)</option>
                        <option value="3">Three (3)</option>
                        <option value="4">Four (4)</option>

                        @if ($errors->has('year'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="semester">Semester<span class="required">*</span> </label>
                    <select id="semester" required name="semester" spellcheck="false" class="form-control{{ $errors->has('semester') ? ' is-invalid' : '' }}">
                        <option value="">---select year---</option>
                        <option value="1">One (1)</option>
                        <option value="2">Two (2)</option>

                        @if ($errors->has('semester'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                    </span>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg col-md-12" value="Add +"/>
            </div>

        </div>

    </form>

@endsection