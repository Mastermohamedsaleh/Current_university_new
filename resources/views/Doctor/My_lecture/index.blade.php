@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')







<div class="container mt-3">




<div class="row">


<div class="col-3">
<a href="{{route('lecturecreate',$course_id)}}" class="mb-2 btn bg-color2 btn-sm mt-3">Add Lecture</a>
</div>


<div class="col-lg-5 col-md-5 col-sm-12">

<form action="{{route('lecture.index')}}" method="get">
<div class="search-container">  
<input type="text" name="search" placeholder = "Name Lecture">
  <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
</form>
</div>







<div class="container">






<div  class="alert alert text-light" role="alert" style="padding:5px; background:#EBFCF6 ;   border-radius: 10px;">

@forelse($lectures as $lecture)





<div class="row mt-3">



<div class="col">
<div class="d-flex ">
                                
@if($lecture->course->image_name == "defaultcourse.jpg")
<img src="{{URL::asset('assets/images/defaultcourse.jpg')}}" alt="" style="width:150px">
@else
<img src="{{URL::asset('courses/'.$lecture->course->image_name)}}" alt="" style="width:150px">
@endif     
<ul>
                            <li><a href="{{route('lecture.show',$lecture->id)}}"><h4 >{{$lecture->title}}</h4></a> </li>
                            <li> <span class=" text-muted">{{$lecture->course->name}}</span></li>
                            <li> <span class=" text-muted">{{$lecture->college->name}}</span></li>
                            <li> <span class=" text-muted">{{$lecture->classroom->name}}</span></li>
                            <li> <span class=" text-muted">{{  (  $lecture->section_id ? $lecture->section->name : '' ) }}</span></li>
                        </ul>
                          
                      </div>
          
</div>

                      <div class="col">
                      <div class="mt-2">

                    <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn bg-color2 dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:400px">
    <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <ul
    
     class="dropdown-menu" 
     aria-labelledby="btnGroupDrop1"
     >

  <li> <a type="button" style="margin-left:12px" data-bs-toggle="modal" data-bs-target="#deletelecture{{$lecture->id}}">
      <i class="fa-solid fa-trash"></i>Delete
  </a>

</li>

     <li><a href="{{route('lecture.edit',$lecture->id)}}" class="btn btn-success btn-sm dropdown-item"><i class="fa-solid fa-pen-to-square"></i>Edit</a></li>
      <li><a href="{{route('lecture.show',$lecture->id)}}" class="btn btn-primary btn-sm dropdown-item"><i class="fa-solid fa-eye"></i>Show</a></li>
    </ul>

  </div>
</div>

@include('Doctor.My_lecture.delete')






</div>

</div>


</div>




@empty

<div class="alert alert text-light" role="alert" style="padding:5px; background: #E6EDFB ;   border-radius: 10px;">
  <h4 class="text-center">No Leacture</h4> 
</div>
      
        @endforelse











</div>












</div>







@include('footer')
   