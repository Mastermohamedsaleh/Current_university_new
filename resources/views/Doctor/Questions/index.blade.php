@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')






<h3 class="txt-green text-center">Quizze</h3>



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











<div class="d-flex justify-content-center">
<h2 >All Question : </h2>
<h5  class="mt-2 ">{{$quizz->name}}</h5>
</div>


<div class="container mt-3">







<a href="{{route('questions.show',$quizz->id)}}" class="mb-2 btn bg-color2 btn-sm">Add New questions</a>















<div class="table-responsive">
                        <table id="datatable"  class="table table-hover table-bordered">


                        <thead>
                        <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Answers</th>
                                <th>Right Answer</th>
                                <th>Score</th>
                                <th>Name Quizze</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i= 1  ?>
             @foreach($questions as $question)
                            <tr>
                            <td> {{$i++}} </td>
                            <td>{{$question->title}}</td>
                            <td>{{$question->answers}}</td>
                            <td>{{$question->right_answer}}</td>
                            <td>{{$question->score}}</td>
                            <td>{{$question->quizze->name}}</td>
               
                
                            <td>
<button type="button" class="mb-2 btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete_question{{ $question->id }}" >  <i class="fas fa-trash"></i></button>

@include('Doctor.Questions.delete')


                            </td>
                    </tr>
               @endforeach
               </tbody>

</table>

</div>

</div>





@include('footer')