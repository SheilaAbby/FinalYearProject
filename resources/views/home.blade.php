@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>
                        N0:
                    </th>
                    <th>
                        Unit Code
                    </th>
                    <th>
                        Unit Name
                    </th>
                    <th>
                        Lecturer
                    </th>



                </tr>
                </thead>
                <tbody>
                @foreach($getUnits as $unit)

                    <tr>
                        <td>{{$number++}}</td>
                        <td>{{$unit->unit_code}}</td>
                        <td>{{$unit->unit_name}}</td>
                        <td>{{$unit->name}}</td>
                        <td>

                            <a href='{{url("/assessLect/{$unit->id}")}}'><button class="btn btn-success">Assess</button></a>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
  </div>
    </div>
</div>
@endsection
