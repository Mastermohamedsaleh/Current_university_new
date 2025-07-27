@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')






@if ($errors->any())
                    <div class="alert alert-danger" style="width:300px; margin:0px auto">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



<div class="container mt-5">

<form action="{{route('assignments.update',$assignment->id)}}" method="post" autocomplete="off"  enctype="multipart/form-data">

@csrf
@method('PUT')


<div class="card">

<div class="card-body">



<div class="row">


<legend><span class="number bg-color2"><i class="fa-solid fa-pen"></i></span> Edit Assignment</legend>

<div class="col-6">

<label > Name Assignment : <span class="text-danger">*</span></label>

<input type="text" name="name" value="{{$assignment->name}}" >

</div>
<div class="col">
                                        <div class="form-group">
                                            <label > course : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="course_id">
                                                <option selected disabled>Choose course  ...</option>
                                                @foreach($courses as $course)
                                                    <option  value="{{ $course->id }}"  {{   $course->id  == $assignment->course_id ?  "selected" :  ""  }}>{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                </div>
        </div>




        <div class="col-6">
        <label > Start_time : <span class="text-danger">*</span></label>
         <input type="datetime-local" name="start_time" value="{{$assignment->start_time}}">
        </div>
        <div class="col-6">
        <label > End_time : <span class="text-danger">*</span></label>
         <input type="datetime-local" name="end_time" value="{{$assignment->end_time}}">
        </div>



        

        <div class="col-12">
      
            <label >Degree : <span class="text-danger">*</span></label>
            <select class="custom-select mr-sm-2" name="degree" >
                <option selected disabled>  Choose Degree...</option>
                <option value="1" {{($assignment->degree == 1  ? 'selected' : '' )}} >1</option>
                <option value="2" {{($assignment->degree == 2  ? 'selected' : '' )}}>2</option>
                <option value="2.5" {{($assignment->degree == 2.5  ? 'selected' : '' )}}>2.5</option>
                <option value="3" {{($assignment->degree == 3  ? 'selected' : '' )}}>3</option>
                <option value="5" {{($assignment->degree == 5  ? 'selected' : '' )}}>5</option>
                <option value="10" {{($assignment->degree == 10  ? 'selected' : '' )}}>10</option>
                <option value="15" {{($assignment->degree == 15  ? 'selected' :  '')}}>15</option>
                <option value="20" {{($assignment->degree == 20  ? 'selected' : '' )}}>20</option>
                <option value="20" {{($assignment->degree == 20  ? 'selected' : '' )}}>25</option>
                <option value="30" {{($assignment->degree == 30  ? 'selected' : '' )}}>30</option>
            </select>
    
    </div>




<div class="col-12 mb-2">
<label > File name : <span class="text-danger">*</span></label>
<input type="file" accept="application/pdf" name="file_name" >
</div>
     


</div>


<button type="submit" class="btn bg-color2 btn-sm">Update</button>
</div>
</div>


</form>








</div>








@include('footer')