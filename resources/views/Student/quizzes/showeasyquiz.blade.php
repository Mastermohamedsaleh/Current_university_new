@include('header')
  <div class="wrapper">
  @include('sidebar_student')

      <div class="main">
@include('nav')






  <div class="container">


  @php  $ti =  $Quizzes->end_time @endphp



<!-- Display the countdown timer in an element -->
<p id="demo" style="width:200px ;margin:auto;font-size:30px;font-weight:600" class="text-success"></p>
 
  <form method="POST" action="{{route('student_quiz.store')}}">
                        @csrf


         <input type="hidden" name="quizze_id" value="{{$Quizzes->id}}">
         <input type="hidden" name="course_id" value="{{$Quizzes->course_id}}">

                        @foreach($questions as $question)
        <div class="card mt-3">
  
      
            <!-- <div class="card @if(!$loop->last)mb-3 @endif"> -->
                             
    
        
           
      


   
        <div class="card-body">

        <h4 class="text-success"> {{ $question->title }}</h4>
            


        <input type="hidden" name="questions[{{ $question->id }}]" value="">
             @foreach($question->questionOptions as $option)
             <div class="form-check">
              <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif>
              <label class="form-check-label" for="option-{{ $option->id }}">
                  {{ $option->option_text }}
              </label>
            </div>
@endforeach



        </div>


        </div>

        @endforeach

        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-6">
                                <button type="submit" class="btn bg-color2 btn-sm">
                                    Submit
                                </button>
                            </div>


</form>


  </div>







<script>





// Set the date we're counting down to
var countDownDate = new Date("{{$ti}}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

// Get today's date and time
var now = new Date().getTime();

// Find the distance between now and the count down date
var distance = countDownDate - now;

// Time calculations for days, hours, minutes and seconds

var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// Display the result in the element with id="demo"
document.getElementById("demo").innerHTML =   hours + "h "
+ minutes + "m " + seconds + "s ";

// If the count down is finished, write some text
if (distance < 0) {
clearInterval(x);
document.getElementById("demo").innerHTML = "EXPIRED";
}
}, 1000);






</script>






  @include('footer')