@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')



<div class="container">

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


<form method="post" action="{{route('onlinecourse.store')}}">

@csrf




<div class="card">

<div class="card-body">




<div class="row">



<div class="col-12">
 <select name="course_id" id="">
   @foreach($courses as $course)
       <option value="{{$course->id}}">{{$course->name}}</option>
   @endforeach
 </select>

</div>

<div class="col-md-4">
    <div class="form-group">
        <label> Title Lecuter : <span class="text-danger">*</span></label>
        <input  name="topic" type="text">
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label>  Date : <span class="text-danger">*</span></label>
        <input  type="datetime-local" name="start_time">
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>  Duration of the class in minutes : <span class="text-danger">*</span></label>
        <input  name="duration" type="text">
    </div>
</div>


<div class="col-4">
   
 <label for=""> Number meeting</label>
 <input type="text" name="meeting_id" id="">
</div>

<div class="col-4">
    <label for=""> Password meeting</label>
    <input type="text" name="password" >
</div>

<div class="col-4">
    <label for=""> Link Start</label>
    <input type="text" name="start_url">
</div>

<div class="col-14">
    <label for=""> Link Enter Student </label>
    <input type="text" name="join_url">
</div>

</div>
<button 
type="submit" class="btn  btn-sm bg-color2">submit</button>


</div>


</form>




</div>


</div>

</div>

@include('footer')