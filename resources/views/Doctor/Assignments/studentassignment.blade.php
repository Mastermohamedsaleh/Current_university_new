@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')


<style>
.bg-light-green{
    background-color:#00d08418;
}

</style>


@if(Session::has('message'))
<p class="alert alert-info" style="width:300px; margin:0px auto">{{ Session::get('message') }}</p>
@endif

@if ($errors->any())
                    <div class="alert alert-danger" style="width:300px; margin:0px auto">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif











<div class="container mt-5">




  <!-- title -->
  <div class="fs-5 fw-bold">
  <a href="{{url('show_pdf_student',[$viewassignment->id , $viewassignment->course_id ])}}" style="color:#00d084">
    <img src="{{URL::asset('assets/images/unnamed.png')}}" alt="" width="20px"> {{$viewassignment->assignment->name}}
</a>
  </div>
                <!-- assignment info -->
                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 bg-light-green"
                  >
                  Send Time
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green bg-light-green"
                  >
                  {{  date('l' , strtotime($viewassignment->created_at ) )}} {{ date('h:i A' , strtotime( $viewassignment->start_time ) )}}
                  </li>
                </ul>
                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6"
                  >
                    Udpate Time
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green"
                  >
                  {{  date('l' , strtotime($viewassignment->udpated_at ) )}} {{  date('h:i A' , strtotime($viewassignment->end_time ) )}}
                  </li>
                </ul>
                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 bg-light-green"
                  >
                    Degree
                  </li>
                  
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green bg-light-green"
                  >
    @php $score = \App\Models\DegreeAssignment::where('assignment_id',$viewassignment->assignment_id)->where('student_id',$viewassignment->student_id)->pluck('score')->first() @endphp
                  
                  {{  ($score ? $score : '-') }} 
                  </li>
                </ul>
                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6"
                  >
                   Add Degree
                  </li>
</ul>
        <form action="{{url('degreeassignment')}}" method="post"  style="margin:0px;padding:0px">
        @csrf  
        <ul class="list-group list-group-horizontal w-100 rounded-0">  
        <li class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6">
                  <input type="number" name="score">
      <button type="submit"  class="btn bg-color2 btn-sm" >Submit</button>

         </li>
  
         </ul>
   
     <input type="hidden" value="{{$viewassignment->assignment_id}}" name="assignment_id">
    <input type="hidden" value="{{$viewassignment->student_id}}" name="student_id">
    <input type="hidden" value="{{$viewassignment->course_id}}" name="course_id">

             </form>


              </div>
            </div>
          </div>
        </div>








</div>







@include('footer')