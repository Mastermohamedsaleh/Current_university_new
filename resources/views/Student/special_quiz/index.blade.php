@include('header')
  <div class="wrapper">
  @include('sidebar_student')

      <div class="main">
@include('nav')






<h3 class="txt-green text-center">Special Quiz</h3>



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
                                <th>Course</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i= 1  ?>
             @foreach($quizzes as $quizze)
                            <tr>
                            <td> {{$i++}} </td>
                          <td>{{$quizze->quiz->name}}</td>
                          <td>{{$quizze->Course->name}}</td>
                     
                      <td>

   
        <?php $mytime = \Carbon\Carbon::now('Africa/Cairo')->addHours(1);
        $mytime = $mytime->toDateTimeString();
        $end_time = $quizze->end_time;
        $start_time = $quizze->start_time;?>
          @if(  $mytime <= $start_time  )                 
              <p>No Start Unit</p>
          @else 

          
                    @if($mytime <= $end_time)
                        <a href="{{route('student_quiz.show',$quizze->quizze_id)}}"
                                class="btn btn-outline-success btn-sm" role="button"
                                aria-pressed="true" onclick="alertAbuse()">
                                <i class="fas fa-person-booth"></i></a>
                        @else
                        {{  "Quiz  End" }}  
                        @endif
    
               
           @endif
              </td>
                    </tr>
               @endforeach
               </tbody>

</table>

</div>

</div>



<script>
     function alertAbuse() {
                alert("برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم الغاء الاختبار بشكل اوتوماتيك ");
            }
</script>



@include('footer')