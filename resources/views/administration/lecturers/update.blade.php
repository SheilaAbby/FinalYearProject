@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <form method="POST" action='{{url("/updated/{$lecturer->id}")}}'>
                @csrf

                <div class="form-group row">
                    <label for="name">Name<span class="required" style="color: red">*</span> </label>
                    <input  id="name" required name="name" spellcheck="false" value="{{$lecturer->name}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  />
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>


                <div class="form-group row">
                    <label for="lect_number">Lecturer No:<span class="required" style="color: red">*</span> </label>
                    <input value="{{$lecturer->lect_number}}" id="lect_number" required name="lect_number" spellcheck="false" class="form-control{{ $errors->has('lect_number') ? ' is-invalid' : '' }}"  />
                    @if ($errors->has('lect_number'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lect_number') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary btn-lg" >Update</button>
                </div>
            </form>

        </div>
    </div>

@endsection