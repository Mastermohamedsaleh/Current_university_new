
@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')


<div class="container mt-3">



<a href="{{route('studyschedule.create')}}" class="btn  bg-color2 btn-sm mb-3">Add Schedule</a>




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









<div class="card">


<div class="card-body">




<form action="{{route('studyschedule.show','test')}}" method="get">

<div class="row">


<div class="col-lg-2 col-md-6 col-sm-6">
   

<label>Collge: <span class="text-danger">*</span> </label>

<select name="college_id" >
<option value="" >Choose College</option>
@foreach($colleges as $college)
<option value="{{$college->id}}">{{$college->name}}</option>
@endforeach
</select>

</div>


<div class="col-lg-2 col-md-6 col-sm-6">

<label>Classroom: <span class="text-danger">*</span> </label>
<select name="classroom_id" >
 <option value="" disabled>Choose Classroom</option>
       
 </select>

</div>


<div class="col-lg-2 col-md-6 col-sm-6">
<label>Section:  </label>
<select name="section_id" >
        <option value="" disabled>Choose Classroom</option>

 </select>

</div>

<div class="col-lg-2 col-md-6 col-sm-6">
<div class="form-group">
<label> Year: <span class="text-danger">*</span> </label>
<select class="custom-select mr-sm-2" name="year" >
          @php
              $current_year = date("Y");
          @endphp
          @for($year=$current_year; $year<=$current_year +1 ;$year++)
              <option value="{{ $year}}">{{ $year }}</option>
          @endfor
      </select>
</div> 
</div>

<div class="col-lg-2 col-md-6 col-sm-6">
<div class="form-group">
<label> Semester: <span class="text-danger">*</span> </label>
<select class="custom-select mr-sm-2" name="semester" >

              <option value="semester1">Semester 1</option>
              <option value="semester2">Semester 2</option>

      </select>
</div> 
</div>





<div class="col-lg-2 col-md-6 col-sm-6">
<label> Search: <span class="text-danger">*</span> </label>
<button type="submit" class="btn  bg-color2 btn-sm">Search</button>
</div>








<!-- end Row -->
</div>


</form>





<!-- End Card Body -->
</div>



<!-- end Card -->
</div>





<!-- Card Show Schedule -->



<div class="card mt-3">




<div class="card-body">





@if( isset( $studyschedule ))




@foreach($studyschedule as $schedule)







@endforeach

<div class="table-responsive">
<table   class="table table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">




                                           <tr>
                                            <th>name Course</th>
                                            <th>Day</th>
                                            <th>Location</th>
                                            <th>Doctor</th>
                                            <th>Start time</th>
                                            <th>End time</th>
                                            <th>Action</th>
                                           </tr>
                                 @foreach($studyschedule as $schedule)
                                           <tr>
                                            <td>{{$schedule->course->name}}</td>
                                            <td>{{ $schedule->course_day }}</td>
                                            <td>{{$schedule->location}}</td>
                                            <td>{{$schedule->doctor->name}}</td>
                                            <td>{{ date('h:i A' , strtotime($schedule->start_time) ) }}  </td>
                                            <td>{{ date('h:i A' , strtotime($schedule->end_time) ) }}</td>
                                            
                                            <td>




<button type="button" class="mb-2 btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editschedule{{$schedule->id}}">
<i class="fas fa-edit"></i>
</button>


<button type="button" class="mb-2 btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteschedule{{$schedule->id}}">
<i class="fas fa-trash"></i>
</button>

@include('Admin.studyschedule.edit')
@include('Admin.studyschedule.delete')


                                            </td>
                                           </tr>
                                 @endforeach

</table>


</div>








@endif



<!-- end Card Body -->
</div>





<!-- end Card -->
</div>
















</div>








 @include('footer')



