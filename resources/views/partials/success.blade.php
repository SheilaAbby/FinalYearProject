<html>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<head>
<style>
    /*#results{*/
        /*display: none;*/
    /*}*/
</style>
</head>
<body>
<div class="container" style="margin-top: 5%">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header text-center">
                    <h4>Evaluation Results for Instructor: <b>{{Auth::user()->name}}</b>
                        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm float-right"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Log Out</a> </h4>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        @foreach( $assessment as $assess)
                        <div class="row">
                            <div class="col-md-4 units" style="border-right: 1px solid black;">
                                <h4 style="text-decoration: underline;margin-left: 25px">Units:</h4>

                                    <ul style="list-style-type: decimal;">
                                        <li>{{$assess->unit_code}}&nbsp; </li>
                                    </ul>

                            </div>
                            <div class="col-md-8 float-right" id="results">
                                <h4 style="text-decoration: underline;margin-left: 25px" class="">Score:</h4><br>
                                <p><b>Percentage score:</b> {{sprintf('%0.2f',$assess->score)}}%</p>
                                <p><b>Quality Assurance Comments:</b> {{$assess->comments}}.</p>

                            </div>

                            <script>
                                $(document).ready(function () {
                                    $("#score").click(function () {
                                        $("#results").show(3000);
                                    })
                                })
                            </script>
                        </div>
                            <hr>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/jquery-3.2.1.js')}}"></script>
</body>
</html>
