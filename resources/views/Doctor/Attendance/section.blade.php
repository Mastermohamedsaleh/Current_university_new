@include('header')
  <div class="wrapper">
    @include('sidebar_doctor')

      <div class="main">
@include('nav')



<div class="container">





<h4 class="text-primary text-center mt-5">Attendance</h4>
    <div class="row mt-3">
    @foreach($colleges as $college )






    <div class="col-sm-12  mt-3">





    <div class="card shadow" style="width:700px;   margin: 0 auto " >
 <div class="card-header">
  {{$college->name}}
 </div>
 <ul class="list-group list-group-flush">
  <a href="{{route('attendance.show',$college->id)}}"><li class="list-group-item text-primary text-center">View Section {{$college->name}}</li></a> 
 
 </ul>
</div> 



     <!-- end col one -->
    </div>

@endforeach
<!-- end Row -->
</div>

<!-- end container -->
</div>












 @include('footer')