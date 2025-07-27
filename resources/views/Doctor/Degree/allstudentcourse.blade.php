@include('header')
  <div class="wrapper">
    @include('sidebar_doctor')

      <div class="main">
 @include('nav')


 
 






 





 <div class="container">



 <div class="col-lg-5 col-md-5 col-sm-12">

<form action="{{route('viewstudentincourse',$course->id)}}" method="get">
<div class="search-container">  
<input type="text" name="search" placeholder = "Name Student Or Email">
  <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
</form>
</div>

<div class="card">


<div class="card-body">



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
                                        
                              <a href="{{url('viewdegree', [ $student->id , $course->id ] )}}" class="btn bg-color2 btn-sm"><i class="fa-solid fa-eye"></i></a>
                           
                                    </td>
                                 @empty
                                   <h4 class="text-center text-danger"> No Student</h4> 
                                 @endforelse
                                        </div>
                                 
                                    </td>
                                </tr>
                           
                      </table>
                 






</div>














</div>









 </div>







 @include('footer')