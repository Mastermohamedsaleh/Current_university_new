@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

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







<a href="{{route('quizzes.create')}}" class="mb-2 btn bg-color2 btn-sm">Add Quiz</a>













<div class="card">

<div class="card-body">




<div class="table-responsive">
                        <table id="datatable"  class="table table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">


                        <thead>
                        <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Name Doctor</th>
                                <th>College</th>
                                <th>Classroom</th>
                                <th>Section</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i= 1  ?>
             @foreach($quizzes as $quizze)
                            <tr>
                            <td> {{$i++}} </td>
                      <td>{{$quizze->name}}</td>
                      <td>{{$quizze->course->name}}</td>
                      <td>{{$quizze->doctor->name}}</td>
                      <td>{{$quizze->college->name}}</td>
                      <td>{{$quizze->classroom->name}}</td>
                      <td>{{ ( $quizze->section_id  ? $quizze->section->name  :  'No Section' ) }}</td>
                
                            <td>
<button type="button" class="mb-2 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete_quizze{{ $quizze->id }}" >  <i class="fas fa-trash"></i></button>
<a href="{{route('quizzes.show',$quizze->id)}}" class="mb-2 btn btn-success btn-sm"  title="Add Questions" ><i class="fa-solid fa-circle-question"></i></a>


<a href="{{route('student.quizze',$quizze->id)}}" class="btn btn-primary btn-sm mb-2" title="Show Degree Students"  role="button" aria-pressed="true"><i
                                                            class="fa fa-street-view"></i></a>
@include('Doctor.Quizzes.delete')

                            </td>
                    </tr>
               @endforeach
               </tbody>

</table>

</div>


</div>


</div>



</div>






@include('footer')