@include('header')
  <div class="wrapper">
  @include('sidebar_doctor')

      <div class="main">
@include('nav')






<div class="container">






<div class="container mt-5">
<div class="row">

<?php $i = 1 ;  ?>
@foreach($courses as $course)
    <div class="col-lg-4">
        <div class="card card-margin">

            <div class="card-header no-border">
                <h5 class="card-title">course</h5>
            </div>

            <div class="card-body pt-0">

                <div class="widget-49">
                    <div class="widget-49-title-wrapper">
                        
                        <div class="widget-49-date-success">
                            <span class="widget-49-date-day">0{{$i++}}</span>
                        </div>

                        <div class="widget-49-meeting-info">
                            <span class="widget-49-pro-title">{{$course->name}}</span>
                        </div>
                    </div>

    <div class="widget-49-meeting-action">
        <a href="{{route('viewstudentincourse',$course->id)}}" class="btn btn-sm btn-flash-border-primary">View All</a>
    </div>
                


                  



            
                </div>
            </div>
        </div>
    </div>


    @endforeach


</div>
</div>





</div>









@include('footer')
