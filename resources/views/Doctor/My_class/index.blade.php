@include('header')
  <div class="wrapper">
    @include('sidebar_doctor')

      <div class="main">
 @include('nav')

 <div class="container">

<div class="card">


<div class="card-body">

<table  class="table table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">


                                           <tr>
                                                   <th>#</th>
                                                   <th>College</th>
                                                   <th>Classroom</th>
                                                   <th>Section</th> 
                                                   <th>Course</th> 
                                           
                                           </tr>
                                          <?php    $i = 0 ; ?>
                                       @foreach($doctor_colleges as $doctor)
                                           <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$doctor->college->name}}</td>
                                            <td>{{$doctor->classroom->name}}</td>
                                            <td>{{( $doctor->section_id  ? $doctor->section->name : 'No Section' )}}</td>
                                           <td>{{$doctor->name}}</td>

                                          


                                           </tr>
                                    @endforeach


                                           <table>

</div>

</div>


</div>



 @include('footer')