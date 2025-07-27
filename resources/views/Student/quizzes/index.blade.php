@include('header')
  <div class="wrapper">
  @include('sidebar_student')

      <div class="main">
@include('nav')






<h3 class="txt-green text-center">Quiz</h3>



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

<div class="container mt-3">

<div class="table-responsive">
                        <table id="datatable"  class="table table-hover table-bordered">


                        <thead>
                        <tr>
                                <th>#</th>
                                <th>Name Quiz</th>
                                <th>Name Course</th>
                                <th>Name Doctor</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i= 1  ?>
             @foreach($quizzes as $quizze)
                            <tr>
                            <td> {{$i++}} </td>
                      <td>{{$quizze->name}}</td>
                      <td>{{$quizze->Course->name}}</td>
                      <td>{{$quizze->doctor->name}}</td>
                      <td>  {{  date('l' , strtotime( $quizze->start_time ) )}} {{  date('h:i A' , strtotime( $quizze->start_time ) )}}</td>
                      <td> {{  date('l' , strtotime( $quizze->end_time ) )}} {{  date('h:i A' , strtotime( $quizze->end_time ) )}}</td>

                      <td>

            
   
                      <?php  
                      
                      if($quizze->type_quiz == 1){
                        $fun = "alertAbuse()" ;
                      }else{
                        $fun = true;
                      }
                       
                      ?>

   
                      <?php $mytime = \Carbon\Carbon::now('Africa/Cairo')->addHours(1);
        $mytime = $mytime->toDateTimeString();
        $end_time = $quizze->end_time;
        $start_time = $quizze->start_time;?>
          @if(  $mytime <= $start_time  )                 
              <p>No Start Unit</p>
          @else 
                @php $student_exams = route('student_quiz.show',$quizze->id)  @endphp
               <?php  $question = App\Models\Question::where('quizze_id',$quizze->id)->first(); ?> 
                @if($question == null)
                      No Quetions Until Now
                @else 

                @if( \App\Models\SpecialQuiz::where('quizze_id',$quizze->id)->where('student_id',\Auth::guard('student')->user()->id)->first() )
                {{"Special Quizze"}}
             @else

             @php $degree =  \App\Models\Degree::where('student_id',\Auth::guard('student')->user()->id)->where('quizze_id',$quizze->id)->first() @endphp

             @if(isset($degree))
               <a href="{{URL('Detailsquizanddedegree', $quizze->id)}}"
                                class="btn btn-outline-success btn-sm" role="button"
                                aria-pressed="true" >
                                <i class="fa-solid fa-d"></i></a>
            
                @else
                    @if($mytime <= $end_time)
                        <a href="{{route('student_quiz.show',$quizze->id)}}"
                                class="btn btn-outline-success btn-sm" role="button"
                                aria-pressed="true"   onclick="{{$fun}}"    >
                                <i class="fas fa-person-booth"></i></a>
                        @else
                        {{  "Quiz  End" }}  
                        @endif
                           @endif

                @endif


                      @endif
           @endif
              </td>
                    </tr>
               @endforeach
               </tbody>

</div>

</div>



<script>
 





     function alertAbuse() {
                alert("برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم الغاء الاختبار بشكل اوتوماتيك ");
            }


   
</script>



@include('footer')