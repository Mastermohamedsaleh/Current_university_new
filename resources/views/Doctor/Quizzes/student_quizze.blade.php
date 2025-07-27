@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')












<div class="container mt-5">


<h3 class="txt-green text-center">Degree Student</h3>




@if ($errors->any())
                    <div class="alert alert-danger" style="width:300px; margin:0px auto">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                @if(Session::has('message'))
<p class="alert alert-info" style="width:300px; margin:0px auto">{{ Session::get('message') }}</p>
@endif




<div class="card">


<div class="card-body">
                     <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> Name Student</th>
                                            <th>Degree</th>
                                            <th>Play</th>
                                            <th> Date </th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($degrees as $degree)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$degree->student->name}}</td>
                                                <td>{{$degree->score}}</td>
                                                @if($degree->abuse == 0)
                                                    <td style="color: green">  No Play</td>
                                                    @else
                                                    <td style="color: red"> Play </td>
                                                @endif
                                                <td>{{$degree->date}}</td>
                                                  @if($degree->abuse == 1) 
                                                <td> 
                                    <button type="button" class="btn btn bg-color2 btn-sm"
                                     data-bs-toggle="modal"
                                     data-bs-target="#repeat_quizze{{ $degree->quizze_id }}" title="إعادة">
                                    <i class="fas fa-repeat"></i></button>    
                                                </td>
                                                   @else 
                                                <td>No Play</td>
                                         @endif 
                                            </tr>


                                      
                                            
                                            <!-- Modal -->
<div class="modal fade" id="repeat_quizze{{$degree->quizze_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Repeat Quiz</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 

      <form action="{{url('repeat_quizze', $degree->quizze_id)}}" method="post">
                                     {{method_field('post')}}
                                      @csrf
                      
                                      <div class="modal-body">
                                  <h6>{{$degree->student->name}}</h6>
                                  <input type="hidden" name="student_id" value="{{$degree->student_id}}">
                                  <input type="hidden" name="quizze_id" value="{{$degree->quizze_id}}">
                                  <input type="hidden" name="course_id" value="{{$degree->course_id}}">

                                  <input type="datetime-local" name="start_time">
                                  <input type="datetime-local" name="end_time">

                              </div>
                           
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary button-mode" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-color2 button-mode">Save</button>
      </div>
   
</form>

@endforeach 
    </div>

  </div>
</div>



</tbody>
</table>




</div>





</div>


</div>










@include('footer')