@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <form method="POST" action="{{ url('/saveCourse') }}">
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
                    <label for="course_code">Course Code:<span class="required" style="color: red">*</span> </label>
                    <input placeholder="Course Code" id="course_code" required name="course_code" spellcheck="false" class="form-control{{ $errors->has('course_code') ? ' is-invalid' : '' }}"  />
                    @if ($errors->has('course_code'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('course_code') }}</strong>
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