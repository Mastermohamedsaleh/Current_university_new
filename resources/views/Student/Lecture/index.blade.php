@include('header')
  <div class="wrapper">
  @include('sidebar_student')

      <div class="main">
@include('nav')




<div class="container">
<h3 class="text-center txt-green mt-3">My Lecture</h3>


<div class="col-lg-5 col-md-5 col-sm-12">

<form action="{{route('lecturestudent',$id)}}" method="get">
<div class="search-container">  
<input type="text" name="search" placeholder = "Name Lecture">
  <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
</form>
</div>




@forelse($lectures as $lecture)
<div  class="alert alert text-light" role="alert" style="padding:5px; background: #EBFCF6 ;   border-radius: 10px;">


<div class="d-flex ">
                                
  @if($lecture->course->image_name == "defaultcourse.jpg")
  <img src="{{URL::asset('assets/images/defaultcourse.jpg')}}" alt="" style="width:150px">
  @else
  <img src="{{URL::asset('courses/'.$lecture->course->image_name)}}" alt="" style="width:150px">
  @endif      
                          <ul>
                           <a href="{{route('viewlecture',$lecture->id)}}"><li> <h3>{{$lecture->title}}</h3></li></a>
                              <li> <span class=" text-muted">{{$lecture->course->name}}</span></li>
                              <li> <span class=" text-muted">{{$lecture->college->name}}</span></li>
                              <li> <span class=" text-muted">{{$lecture->classroom->name}}</span></li>
                              <li> <span class=" text-muted">{{  (  $lecture->section_id ? $lecture->section->name : '' ) }}</span></li>
                          </ul>
                          
                      </div>
               

</div>

@empty

<div class="alert alert text-light" role="alert" style="padding:5px; background: #E6EDFB ;   border-radius: 10px;">
  <h4 class="text-center">No Leacture</h4> 
</div>
      
        @endforelse
 {{ $lectures->links() }}











</div>




@include('footer')
