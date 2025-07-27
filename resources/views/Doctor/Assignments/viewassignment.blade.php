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
 
   <div class="container">
   
           
        <table class="table">

         <th>
         
            <td>name</td>
            <td>course</td>
            <td>View</td>
         </th>
         <?php $i= 1  ?>
          @foreach($viewassignments as $viewassignment )
           <tr>
           <td> {{$i++}} </td>
            <td>{{$viewassignment->assignment->name}}</td>
            <td>{{$viewassignment->Course->name}}</td>
            <td><a href="{{url('pdfstudentassignment',[$viewassignment->id ,$viewassignment->course_id])}}" class="btn bg-color2 btn-sm"><i class="fa-solid fa-eye"></i></a></td>


     </tr>
     @endforeach
     <tr>
      <td><h3>Total Degree :</h3> </td><td> <h4>{{$score}}</h4></td><td></td><td></td>
     </tr>
    
   </div>
  
  



 @include('footer')
