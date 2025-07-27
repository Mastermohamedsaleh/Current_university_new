@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')








 <div class="container">






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




<div class="card mt-5">


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
                                            <td>{{( $doctor->section_id  ? $doctor->section->name : 'No Section' ) }}</td>
                                            <td>{{$doctor->name}}</td>   <!-- name Course Not name Doctor Look in method Show in controller  -->
                              

                                           </tr>
       @endforeach


                                           <table>










</div>

</div>


</div>



 @include('footer')