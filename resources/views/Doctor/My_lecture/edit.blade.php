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



                @if(Session::has('message'))
<p class="alert alert-info" style="width:300px; margin:0px auto">{{ Session::get('message') }}</p>
@endif
<div class="container mt-5">
<div class="card">



<div class="card-body">



<form action="{{route('lecture.update',$lecture->id)}}" method="post"  enctype="multipart/form-data">

@csrf
@method('PUT')



<div class="row">


<legend><span class="number bg-color2"><i class="fa-solid fa-pen"></i></span> Edit Lecture</legend>

<div class="col-12">

<label for="">Title<span class="text-danger">*</span> </label>
<input type="text" name="title" value="{{$lecture->title}}" >

</div>

<div class="col-12">


<label>Course: <span class="text-danger">*</span> </label>
<select name="course_id" >
        <option value="" >Choose Course</option>
            @foreach($courses as $course) 
            <option value="{{$course->id}}" {{ $course->id == $lecture->course_id ? 'selected' : '' }}>{{$course->name}}</option>
            @endforeach
 </select>

</div>



<div class="col-12">                               
<div class="form-group">
    <label for="">Attachment : <span class="text-danger">*</span></label>
    <input type="file" accept="application/pdf" name="file_name" value="$lecture->file_name" >
</div>
                               




</div>





</div>


<button type="submit" class="btn bg-color2 btn-sm mt-2">Update</button>

</form>













</div>





</div>


</div>





@include('footer')














