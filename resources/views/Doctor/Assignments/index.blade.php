@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')






<h3 class=" txt-green text-center">Assignment</h3>



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







<a href="{{route('assignments.create')}}" class="mb-2 btn  bg-color2 btn-sm">Add New Assignment</a>









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
                                <th>College</th>
                                <th>Classroom</th>
                                <th>Section</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i= 1  ?>
             @foreach($assignments as $assignment)
                            <tr>
                            <td> {{$i++}} </td>
                      <td>{{$assignment->name}}</td>
                      <td>{{$assignment->course->name}}</td>
                      <td>{{$assignment->college->name}}</td>
                      <td>{{$assignment->classroom->name}}</td>
                      <td>{{ ( $assignment->section_id  ? $assignment->section->name  :  'No Section' ) }}</td>
                
                            <td>
<button type="button" class="mb-2 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteassignment{{$assignment->id}}" >  <i class="fas fa-trash"></i></button>
<a href="{{route('assignments.edit',$assignment->id)}}" class="mb-2 btn btn-success btn-sm"  title="Add Questions" ><i class="fa-solid fa-edit"></i></a>


<a href="{{route('assignments.show',$assignment->id)}}" class="btn btn-primary btn-sm mb-2" title="Show Degree Students"  role="button" aria-pressed="true">
<i class="fa-solid fa-eye"></i></a>

@include('Doctor.Assignments.delete')
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