@include('header')
  <div class="wrapper">
  @include('sidebar_student')

      <div class="main">
@include('nav')


<style>
    .bg-light-green{
    background-color:#00d08418;
}
.form-assignment{
    margin: 0px;
    padding:0px;
}
</style>

@if(Session::has('message'))
<p class="alert alert-danger" style="width:300px; margin:0px auto">{{ Session::get('message') }}</p>
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



 <?php   $mytime = \Carbon\Carbon::now('Africa/Cairo')->addHours(1);
        $mytime = $mytime->toDateTimeString();
        $end_time = $assignment->end_time;
        $start_time = $assignment->start_time;
 ?>

                <div class="container mt-5">
                  <!-- title -->
                  <a href="{{url('show_pdf',$assignment->id)}}" style="color:#00d084" > 
                  <div class="fs-5 fw-bold"> <img src="{{URL::asset('assets/images/unnamed.png')}}" alt="" width="20px">  {{$assignment->name}}</div>
                 </a>
                <!-- assignment info -->
                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 bg-light-green"
                  >
                    Start Date
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green bg-light-green"
                  >
                  {{  date('l' , strtotime($assignment->start_time ) )}} {{ date('h:i A' , strtotime( $assignment->start_time ) )}}
                  </li>
                </ul>
                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6"
                  >
                    End Date
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green "
                  >
                  {{  date('l' , strtotime($assignment->end_time ) )}} {{  date('h:i A' , strtotime($assignment->end_time ) )}}
                  </li>
                </ul>

                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 bg-light-green "
                  >
                    Degree Assignment
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green bg-light-green"
                  >
                  {{  $assignment->degree }}   
                  </li>
                </ul>




                <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 bg-light-green"
                  >
                  {{ $score = \App\Models\DegreeAssignment::where('assignment_id',$assignment->id)->where('student_id',auth()->user()->id)->pluck('score')->first()}}
                    Degree
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green bg-light-green"
                  >
                  {{  ($score ? $score : '-') }}   
                  </li>
                </ul>


    @if(  $mytime <= $start_time  )                 
    <ul class="list-group list-group-horizontal w-100 rounded-0">
<li class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green">No Start Unit</li>
</ul>  
    @else 



    @if($mytime <= $end_time)
    <form action="{{url('uploadassignment',$assignment->course_id)}}" method="post" enctype="multipart/form-data" class="form-assignment">
        @csrf

 @if(\App\Models\DegreeAssignment::where('student_id',auth()->user()->id)->where('assignment_id',$assignment->id)->first())
 {{""}}
 @else 


 <input type="hidden" value="{{$assignment->id}}" name="id">
 <ul class="list-group list-group-horizontal w-100 rounded-0">
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6"
                  >
                    Choose File
                  </li>
                  <li
                    class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green"
                  >
                    <input
                      class="form-control txt-green"
                      style="border-color: #00d084; max-width: fit-content"
                      type="file"  accept="application/pdf" name="file_name" 
                    />
                  </li>
                </ul>
  
                <ul class="list-group list-group-horizontal w-100 rounded-0"> 

                <li class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 bg-light-green">
               <button class="btn btn-success" type="submit">Submit</button>
             </li>

                </ul>

 
@endif
    </form>
@else 

<ul class="list-group list-group-horizontal w-100 rounded-0">
<li class="list-group-item w-50 border-0 rounded-0 fw-bold fs-6 txt-green">Assignment End</li>
</ul>
       
    @endif
    @endif


         

              </div>
              <div
                class="tab-pane fade"
                id="list-settings"
                role="tabpanel"
                aria-labelledby="list-settings-list"
              >
                ...
              </div>
            </div>
          </div>
        </div>


        </div>










@include('footer')