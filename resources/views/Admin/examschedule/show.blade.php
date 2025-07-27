
@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')


 <div class="container mt-3">



 @if ($errors->any())
                    <div class="alert alert-danger" style="width:500px;   margin: 0 auto ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                @if(Session::has('message'))
<p class="alert alert-info" style="width:500px;   margin: 0 auto ">{{ Session::get('message') }}</p>
@endif






 <table   class="table table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">




                                           <tr>
                                            <th>name Course</th>
                                            <th>Exam Date</th>
                                            <th>Start time</th>
                                            <th>End time</th>
                                            <th>Action</th>
                                           </tr>
                                 @foreach($examschedule as $schedule)
                                           <tr>
                                            <td>{{$schedule->course->name}}</td>
                                            <td>{{$schedule->exam_date}}</td>
                                            <td>{{$schedule->start_time}}</td>
                                            <td>{{$schedule->end_time}}</td>
                                            <td>




<button type="button" class="mb-2 btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editschedule{{$schedule->id}}">
<i class="fas fa-edit"></i>
</button>


<button type="button" class="mb-2 btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteschedule{{$schedule->id}}">
<i class="fas fa-trash"></i>
</button>

@include('Admin.examschedule.edit')
@include('Admin.examschedule.delete')


                                            </td>
                                           </tr>
                                 @endforeach

</table>
















 </div>




 @include('footer')