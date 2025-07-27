@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')



<div class="contanier">






<div class="card">



<div class="card-body">





 <!-- title -->
 <div class="fs-3 fw-bold txt-green text-center">My Courses</div>


 <div class="row">



 @foreach($courses as $course)

                                
 @if($course->image_name == "defaultcourse.jpg")
   <?php    $image ='assets/images/defaultcourse.jpg' ?>
  @else
<?php      $image = 'courses/'.$course->image_name  ?>
  @endif 



 <div class="col-4">

                  <!-- content -->
                  <div class="py-4 d-flex flex-wrap w-100">
                    <div
                      class="rounded-4 position-relative m-2 hover3"
                      style="
                        width: 260px;
                        height: 250px;
                        background-image: url({{$image}});
                        background-position: center;
                        background-size: cover;
                      "
                    >
                      <div
                        class="text-white d-flex flex-column position-absolute"
                        style="bottom: 20px; left: 10px"
                      >
                        <a   href="{{route('lecturedoctor',$course->id)}}" class="fs-5 fw-bold h5"
                          >{{$course->name}} </a
                        >
                        <span class="fs-6 txt-gray">#{{$course->college->name}}</span>
                      </div>
                    </div>

                    </div>




</div>

@endforeach



                    </div>
</div>


</div>





@include('footer')