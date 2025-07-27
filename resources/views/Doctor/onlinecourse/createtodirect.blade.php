@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')




<div class="container mt-5">

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



<h3 class="txt-color text-center">Online Zoom</h3>

<div class="card">




<div class="card-body">



    <form action="{{route('onlinecoursedirect.store')}}" method="post">
      @csrf

      


      <div class="row">



      
<div class="col">

<label for="" >Course</label>

      <select name="course" id="">
 
      @foreach($courses as $course)
        <option value="{{$course->id}}">{{$course->name}}</option>
      @endforeach
       
      </select>
</div>



<div class="col">
 
<label for="" >Topic</label>
 <input type="text"  name="topic">


</div>



<div class="col">
<label for="" >Start Time</label>
<input  type="datetime-local" name="start_time">
</div>


<div class="col">
<label for="" >Time Minute</label>
<input  name="duration" type="text">
</div>


      </div>

<button type="submit" class="btn  btn-sm bg-color2" >Submit</button>

    </form>





</div>




</div>



</div>







@include('footer')