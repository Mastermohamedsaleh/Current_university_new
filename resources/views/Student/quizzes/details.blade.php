@include('header')
  <div class="wrapper">
  @include('sidebar_student')

      <div class="main">
@include('nav')








<div class="container">
     
    <span style="font-size:30px;font-weight:600">Score :{{$degree->score}} <h2 style="display:inline-block">&#128513;</h2>   </span> 
    <div class="mt-4">	
    @foreach($answerstudent as $answer)

        <div class="card card-statistics mb-30 mt-2">
            <div class="card-body">
                <h5 class="card-title">{{$answer->question->title}}</h5>
               
               
             
                    <div class="custom-control custom-radio">
                    <div class="d-flex">
                        <input type="radio"  class="custom-control-input"  checked>


                        <label class="custom-control-label"  >{{$answer->answer}}</label> @if ( strcmp(trim($answer->answer), trim($answer->right_answer) ) === 0)
<i class="fa-solid fa-check text-success"></i>
@else
<i class="fa-solid fa-xmark text-danger"></i>
@endif
                    </div>
                    </div>
                    
               <span>Right Answer :</span> {{$answer->right_answer}}
               
            </div>
        </div>
        @endforeach
    </div>

</div>


@include('footer')