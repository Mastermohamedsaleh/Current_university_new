@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')



 <div class="container">
 

 <div class="card">

 <div class="card-body">



 <div class="row">


<div class="col-6">



@if($course->image_name == "defaultcourse.jpg")
<img src="{{URL::asset('assets/images/defaultcourse.jpg')}}" alt="" style="width:300px">
@else
<img src="{{URL::asset('courses/'.$course->image_name)}}" alt="" style="width:300px">
@endif


<form action="{{route('course.update',$course->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="">Update Image</label>
    <input type="file" name="image">

   

    <input type="text" name="name" value="{{$course->name}}">
    <select name="college_id" id="">
      <option value="">Choose College ...</option>
       @foreach($colleges as $college)
             <option value="{{$college->id}}" {{$college->id == $course->college_id ? 'selected':"" }} >{{$college->name}}</option>
       @endforeach
    </select>

    <select name="classroom_id" id="">
      <option value="">Choose Classroom...</option>
      @foreach($classrooms as $classroom)
             <option value="{{$classroom->id}}"  {{$classroom->id == $course->classroom_id ? 'selected':"" }}    >{{$classroom->name}}</option>
       @endforeach
    </select>
    <select name="section_id" id="">
      <option value="">Choose Section...</option>
      @foreach($sections as $section)
             <option value="{{$section->id}}"  {{$section->id == $course->section_id ? 'selected':"" }}    >{{$section->name}}</option>
       @endforeach
    </select>
    <select name="doctor_id" id="">
      <option value="">Choose Doctor...</option>
      @foreach($doctors as $doctor)
             <option value="{{$doctor->id}}"  {{$doctor->id == $course->doctor_id ? 'selected':"" }}    >{{$doctor->name}}</option>
       @endforeach
    </select>

    <select name="semester" id="">
      <option value="semester1"  {{  $course->semester == 'semester1'  ? 'selected'  :  ""  }}>semester 1</option>
      <option value="semester2" {{  $course->semester == 'semester2'  ? 'selected'  :  ""  }}>semester 2</option>
    </select>



    <button type="submit" class="btn bg-color2">update</button>
</form>







</div>


</div>






 </div>
 </div>


 
 

  
 </div>









 @include('footer')