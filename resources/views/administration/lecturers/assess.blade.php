@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">EGERTON UNIVERSITY</h4>
                        <h4 class="text-center">TEACHING EFFECTIVENESS EVALUATION FORM</h4>
                        <h6>Name of the Instructor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="text-right" style="text-decoration: underline;width: 100%;font-weight: bold">{{$lecturer->name}}</span></h6>
                        <h6>Course code and Title:<span>&nbsp;&nbsp;....</span>
                        Class:<span class="text-right" style="text-decoration: underline;width: 100%;font-weight: bold">....</span></h6>
                        <h6>Department:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-right" style="text-decoration: underline;width: 100%;font-weight: bold">Computer Science</span>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-right" style="text-decoration: underline;width: 100%;font-weight: bold">{{date('j-M-Y',strtotime( $lecturer->created_at))}}</span></h6>
                        <h6 style="font-weight: bold">OBJECTIVES</h6>
                        <p>The objective of this instrument is to provide feedback on the quality of teaching and learning to the
                        members of the academic staff</p>
                        <h6 style="font-weight: bold">INSTRUCTIONS</h6>
                        <ul>
                            <li>You are expected to assess the quality of teaching of this course.</li>
                            <li>Your sincere response to all items is vital to the improvement of the teaching of this course.</li>
                            <li>For each item tick the score that best represents your opinion on the matter.</li>
                            <li>You need to identify yourself.</li>
                            <li>The information you provide will not be used against you or the lecturer.</li>
                        </ul>
                    </div>
                    <div class="card-body"></div>

                    <form class="form-control" method="post" action='{{url("/assess/$lecturer->id")}}'>
                        {{csrf_field()}}
                    <table  class="col-12 table table-dark table-bordered table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>SCORE</th>
                        </tr>
                        </thead>
                        <thead>
                        <tr>
                            <th></th>
                            <th>ITEM</th>
                            <th>V.Good</th>
                            <th>Good</th>
                            <th>Fair</th>
                            <th>Poor</th>
                            <th>V.Poor</th>
                        </tr>
                        </thead>
                        <thead>
                        <tr>
                            <th>A</th>
                            <th>Presentation</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Sets a stimulating learning atmosphere</td>
                            <td><input type="radio" name="presentation" value="5" checked><br></td>
                            <td><input type="radio" name="presentation" value="4"><br></td>
                            <td><input type="radio" name="presentation" value="3"><br></td>
                            <td><input type="radio" name="presentation" value="2"><br></td>
                            <td><input type="radio" name="presentation" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Uses relevant examples/illustrations to explain principles and concepts</td>
                            <td><input type="radio" name="presentation1" value="5" checked><br></td>
                            <td><input type="radio" name="presentation1" value="4"><br></td>
                            <td><input type="radio" name="presentation1" value="3"><br></td>
                            <td><input type="radio" name="presentation1" value="2"><br></td>
                            <td><input type="radio" name="presentation1" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Encourages and appreciates students' participation</td>
                            <td><input type="radio" name="presentation2" value="5" checked><br></td>
                            <td><input type="radio" name="presentation2" value="4"><br></td>
                            <td><input type="radio" name="presentation2" value="3"><br></td>
                            <td><input type="radio" name="presentation2" value="2"><br></td>
                            <td><input type="radio" name="presentation2" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Presents content logically and coherently</td>
                            <td><input type="radio" name="presentation3" value="5" checked><br></td>
                            <td><input type="radio" name="presentation3" value="4"><br></td>
                            <td><input type="radio" name="presentation3" value="3"><br></td>
                            <td><input type="radio" name="presentation3" value="2"><br></td>
                            <td><input type="radio" name="presentation3" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Involves students actively(through questioning , answering, discussions etc).</td>
                            <td><input type="radio" name="presentation4" value="5" checked><br></td>
                            <td><input type="radio" name="presentation4" value="4"><br></td>
                            <td><input type="radio" name="presentation4" value="3"><br></td>
                            <td><input type="radio" name="presentation4" value="2"><br></td>
                            <td><input type="radio" name="presentation4" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Delivers content in a motivating manner.</td>
                            <td><input type="radio" name="presentation5" value="5" checked><br></td>
                            <td><input type="radio" name="presentation5" value="4"><br></td>
                            <td><input type="radio" name="presentation5" value="3"><br></td>
                            <td><input type="radio" name="presentation5" value="2"><br></td>
                            <td><input type="radio" name="presentation5" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Uses relevant teaching aids(chalkboard, projectors, Lab.Apparatus).</td>
                            <td><input type="radio" name="presentation6" value="5" checked><br></td>
                            <td><input type="radio" name="presentation6" value="4"><br></td>
                            <td><input type="radio" name="presentation6" value="3"><br></td>
                            <td><input type="radio" name="presentation6" value="2"><br></td>
                            <td><input type="radio" name="presentation6" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Provides a clear summary of concepts</td>
                            <td><input type="radio" name="presentation7" value="5" checked><br></td>
                            <td><input type="radio" name="presentation7" value="4"><br></td>
                            <td><input type="radio" name="presentation7" value="3"><br></td>
                            <td><input type="radio" name="presentation7" value="2"><br></td>
                            <td><input type="radio" name="presentation7" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Voice clear and audible.</td>
                            <td><input type="radio" name="presentation8" value="5" checked><br></td>
                            <td><input type="radio" name="presentation8" value="4"><br></td>
                            <td><input type="radio" name="presentation8" value="3"><br></td>
                            <td><input type="radio" name="presentation8" value="2"><br></td>
                            <td><input type="radio" name="presentation8" value="1" ><br></td>

                        </tr>
                        </tbody>

                        <thead>
                        <tr>
                            <th>B</th>
                            <th>Subject Matter</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Clear introduction of course objectives and relevance</td>
                            <td><input type="radio" name="presentation9" value="5" checked><br></td>
                            <td><input type="radio" name="presentation9" value="4"><br></td>
                            <td><input type="radio" name="presentation9" value="3"><br></td>
                            <td><input type="radio" name="presentation9" value="2"><br></td>
                            <td><input type="radio" name="presentation9" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Demonstrates mastery of subject matter</td>
                            <td><input type="radio" name="presentation10" value="5" checked><br></td>
                            <td><input type="radio" name="presentation10" value="4"><br></td>
                            <td><input type="radio" name="presentation10" value="3"><br></td>
                            <td><input type="radio" name="presentation10" value="2"><br></td>
                            <td><input type="radio" name="presentation10" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Adequately covers course outline within specific time</td>
                            <td><input type="radio" name="presentation11" value="5" checked><br></td>
                            <td><input type="radio" name="presentation11" value="4"><br></td>
                            <td><input type="radio" name="presentation11" value="3"><br></td>
                            <td><input type="radio" name="presentation11" value="2"><br></td>
                            <td><input type="radio" name="presentation11" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Depth of subject coverage (in depth as opposed to superficial treatment)</td>
                            <td><input type="radio" name="presentation13" value="5" checked><br></td>
                            <td><input type="radio" name="presentation13" value="4"><br></td>
                            <td><input type="radio" name="presentation13" value="3"><br></td>
                            <td><input type="radio" name="presentation13" value="2"><br></td>
                            <td><input type="radio" name="presentation13" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Provides guidance to relevant references.</td>
                            <td><input type="radio" name="presentation14" value="5" checked><br></td>
                            <td><input type="radio" name="presentation14" value="4"><br></td>
                            <td><input type="radio" name="presentation14" value="3"><br></td>
                            <td><input type="radio" name="presentation14" value="2"><br></td>
                            <td><input type="radio" name="presentation14" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Subject matter relevance to course(as per course outline).</td>
                            <td><input type="radio" name="presentation15" value="5" checked><br></td>
                            <td><input type="radio" name="presentation15" value="4"><br></td>
                            <td><input type="radio" name="presentation15" value="3"><br></td>
                            <td><input type="radio" name="presentation15" value="2"><br></td>
                            <td><input type="radio" name="presentation15" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Assignments (relevance and usefulness).</td>
                            <td><input type="radio" name="presentation16" value="5" checked><br></td>
                            <td><input type="radio" name="presentation16" value="4"><br></td>
                            <td><input type="radio" name="presentation16" value="3"><br></td>
                            <td><input type="radio" name="presentation16" value="2"><br></td>
                            <td><input type="radio" name="presentation16" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Gives adequate and relevant assignments/CATS</td>
                            <td><input type="radio" name="presentation17" value="5" checked><br></td>
                            <td><input type="radio" name="presentation17" value="4"><br></td>
                            <td><input type="radio" name="presentation17" value="3"><br></td>
                            <td><input type="radio" name="presentation17" value="2"><br></td>
                            <td><input type="radio" name="presentation17" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Provides feedback of assignments/CATs promptly.</td>
                            <td><input type="radio" name="presentation18" value="5" checked><br></td>
                            <td><input type="radio" name="presentation18" value="4"><br></td>
                            <td><input type="radio" name="presentation18" value="3"><br></td>
                            <td><input type="radio" name="presentation18" value="2"><br></td>
                            <td><input type="radio" name="presentation18" value="1" ><br></td>

                        </tr>
                        </tbody>
                        <thead>
                        <tr>
                            <th>C</th>
                            <th>Personal Attributes</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Attendance/punctuality</td>
                            <td><input type="radio" name="presentation19" value="5" checked><br></td>
                            <td><input type="radio" name="presentation19" value="4"><br></td>
                            <td><input type="radio" name="presentation19" value="3"><br></td>
                            <td><input type="radio" name="presentation19" value="2"><br></td>
                            <td><input type="radio" name="presentation19" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Interaction with students (friendly, approachable, caring, tolerant</td>
                            <td><input type="radio" name="presentation20" value="5" checked><br></td>
                            <td><input type="radio" name="presentation20" value="4"><br></td>
                            <td><input type="radio" name="presentation20" value="3"><br></td>
                            <td><input type="radio" name="presentation20" value="2"><br></td>
                            <td><input type="radio" name="presentation20" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Availability of lecturer for consultations</td>
                            <td><input type="radio" name="presentation21" value="5" checked><br></td>
                            <td><input type="radio" name="presentation21" value="4"><br></td>
                            <td><input type="radio" name="presentation21" value="3"><br></td>
                            <td><input type="radio" name="presentation21" value="2"><br></td>
                            <td><input type="radio" name="presentation21" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Extent to which consultations are helpful</td>
                            <td><input type="radio" name="presentation22" value="5" checked><br></td>
                            <td><input type="radio" name="presentation22" value="4"><br></td>
                            <td><input type="radio" name="presentation22" value="3"><br></td>
                            <td><input type="radio" name="presentation22" value="2"><br></td>
                            <td><input type="radio" name="presentation22" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Confident in presentation and subject matter.</td>
                            <td><input type="radio" name="presentation23" value="5" checked><br></td>
                            <td><input type="radio" name="presentation23" value="4"><br></td>
                            <td><input type="radio" name="presentation23" value="3"><br></td>
                            <td><input type="radio" name="presentation23" value="2"><br></td>
                            <td><input type="radio" name="presentation23" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Adequate lecture rooms preparation.</td>
                            <td><input type="radio" name="presentation24" value="5" checked><br></td>
                            <td><input type="radio" name="presentation24" value="4"><br></td>
                            <td><input type="radio" name="presentation24" value="3"><br></td>
                            <td><input type="radio" name="presentation24" value="2"><br></td>
                            <td><input type="radio" name="presentation24" value="1" ><br></td>

                        </tr>
                        <tr>
                            <td><ul><li></li></ul></td>
                            <td>Students control/Class discipline.</td>
                            <td><input type="radio" name="presentation25" value="5" checked><br></td>
                            <td><input type="radio" name="presentation25" value="4"><br></td>
                            <td><input type="radio" name="presentation25" value="3"><br></td>
                            <td><input type="radio" name="presentation25" value="2"><br></td>
                            <td><input type="radio" name="presentation25" value="1" ><br></td>

                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="form-group">
                        <label for="comments" style="font-size: 15px; font-weight: bold">What is the lecturer doing well with reference to section A ,B ,C</label>
                        <textarea class=" form-control" name="comments" id="comments" rows="7" cols="3" required></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="comments1" style="font-size: 15px; font-weight: bold">What is the lecturer not doing well with reference to section A ,B ,C</label>
                        <textarea class=" form-control" name="comments1" id="comments1" rows="7" cols="3" required></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="comments2" style="font-size: 15px; font-weight: bold">Give your suggestions for improvement.</label>
                        <textarea class=" form-control" name="comments2" id="comments2" rows="7" cols="3" required></textarea>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>

                    </form>



                </div>



            </div>
        </div>
    </div>



    @endsection