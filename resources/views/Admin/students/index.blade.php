@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')




<h3 class="txt-green text-center">students</h3>



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






<div class="container">

<div class="col-lg-5 col-md-5 col-sm-12">

<form action="{{url('students')}}" method="get">
<div class="search-container">  
<input type="text" name="search" placeholder="Search Name OR Email">
  <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
</form>
</div>

 <div class="container mt-3">




 <div class="card">

 <div class="card-body">
       
 
 <a href="{{route('students.create')}}" class="mb-2 btn bg-color2 btn-sm">Add New Student</a>
 

 <div class="table-responsive">
                        <table  class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>College</th>
                                <th>Classroom</th>
                                <th>Section</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?php $i= 1  ?>
                                    @forelse($students as  $student)
                                <tr>
                                    <td> {{$i++}} </td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->college->name }}</td>
                                    <td>{{ $student->classroom->name }}</td>
                                    <td>{{  (  $student->section_id  ?  $student->section->name   : 'No Section' ) }}</td>
                                    <td>
                              




                                    <!-- Example single danger button -->



        




<!-- Example single danger button -->





  <a class="btn btn bg-color2 btn-sm btn-sm" href="{{route('students.edit',$student->id)}}"><i class="fa fa-edit"></i></a>
   
    <button type="button" class=" btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletestudent{{$student->id}}" title="Delete Student">
<i class="fas fa-trash"></i>
</button>








@include('Admin.students.delete')


                                    </td>

                                        </div>

                                    </td>
                                </tr>

                      </table>
                      
                      @empty

<h1 class="text-center text-danger">No Student</h1>


@endforelse
 {{ $students->links() }}

 </div>



 </div>









 <!-- end container -->
 </div>
    

 @include('footer')
