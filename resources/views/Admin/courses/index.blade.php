@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')






 <div class="container mt-5">






<h3 class="txt-green text-center">All Course</h3>





<div class="mb-2">
@if ($errors->any())
                    <div class="alert alert-danger" style="width:500px;   margin: 0 auto ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                @if(Session::has('message'))
<p class="alert alert-info" style="width:500px;   margin: 0 auto ">{{ Session::get('message') }}</p>
@endif

</div>


 <div class="card">



 <div class="card-body">


<a href="{{route('course.create')}}" class="btn  bg-color2 mb-2 btn-sm">Add Course</a>


 <table id="datatable" class="table table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">


                                    <thead>
                                           <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th> College</th>
                                            <th>Proccess</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                   @foreach($courses as $course)
                                           <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td><a href="{{route('course.show',$course->id)}}">{{$course->name}}</a></td>
                                     <td>  {{$course->college->name}}</td>
   
                                        <td>
<button type="button" class="btn btn-outline-danger btn-sm inline-block" data-bs-toggle="modal" data-bs-target="#deletecourse{{$course->id}}">
<i class="fas fa-trash"></i>
</button>
                
@include('Admin.courses.delete')




                                        </td>
                                           </tr>


                                   @endforeach

                                   </tbody>
    </table>                     



 <!-- end card body -->
 </div>





 <!-- end Card -->
 </div>









 <!-- Container -->
 </div>














 @include('footer')