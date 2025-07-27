






<div>
    
@php  $quiz = \App\Models\Quizze::where('id',$quizze_id)->first() ;
      $ti =  $quiz->end_time;
@endphp



<!-- Display the countdown timer in an element -->
<p id="demo" style="width:200px ;margin:auto;font-size:30px;font-weight:600" class="text-success"></p>
    <div>
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h5 class="card-title"> {{$data[$counter]->title}}</h5>

                @foreach(preg_split('/(-)/', $data[$counter]->answers) as $index=>$answer)
                    <div class="custom-control custom-radio">
                    <div class="d-flex">
                        <input type="radio" id="customRadio{{$index}}" name="customRadio" class="custom-control-input" inh>
                        <label class="custom-control-label" for="customRadio{{$index}}" wire:click="nextQuestion({{$data[$counter]->id}}, {{$data[$counter]->score}}, '{{$answer}}', '{{$data[$counter]->right_answer}}')"> {{$answer}}</label>
</div>
                    </div>
                @endforeach

            </div>
        </div>
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

</div>

