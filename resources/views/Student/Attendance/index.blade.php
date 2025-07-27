@include('header')
  <div class="wrapper">
    @include('sidebar_doctor')

      <div class="main">
 @include('nav')

  

  <div class="container mt-2">
  <form action="{{route('attendance.create')}}" method="get">

   <div class="card" >
  
   <div class="card-body">

     
   
  
     <select name="course_id" id="" style="width:300px">
       @foreach($courses_doctors as $course)
        <option value="{{$course->id}}">{{$course->name}}</option>

        @endforeach
     </select>

     <button type="submit" class="btn-sm btn bg-color2 float-end">View</button>
   </form>


 

 

  </div>
  






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




<form method="post" action="{{ route('attendance.store') }}">
  <div class="container mt-2">

@if( isset($students))


<h5  > {{  date('l' , strtotime(date('Y-m-d') ) )}} </h5>
   
        @csrf
  <div class="table-responsive">
                        <table   class="table  table-striped">
                            <thead>
                            <tr>
                                <th class="txt-green">#</th>
                                <th class="txt-green">Name</th>
                               
                                <th class="txt-green">College</th>
                                <th class="txt-green">Classroom</th>
                                <th class="txt-green">Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?php $i= 1  ?>
                                
                            @foreach($students as  $student)


                                <tr>
                                    <td> {{$i++}} </td>
                                    <td>{{ $student->name }}</td>
                                  
                                    <td>{{ $student->college->name }}</td>
                                    <td>{{ $student->classroom->name }}</td>
                                    

                                    <td>


    <!-- <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4"> -->
        <input name="attendences[{{ $student->id }}]" 
         @foreach($student->attendance()->where('attendence_date',date('Y-m-d'))->get() as $attentance)
             {{ $attentance->attendence_status == 1 ? 'checked' : '' }}
         @endforeach
         value="presence"   class="leading-tight" type="radio" >
        <span class="text-success">Present</span>
    <!-- </label> -->

    <!-- <label class="ml-4 block text-gray-500 font-semibold"> -->
        <input name="attendences[{{ $student->id }}]" 
  
               @foreach($student->attendance()->where('attendence_date',date('Y-m-d'))->get() as $attentance)
             {{$attentance->attendence_status == 0 ? 'checked' : ''}}
            
         @endforeach
         class="leading-tight" type="radio" value="absent" >
        <span class="text-danger">Absent</span>
    <!-- </label> -->



<input type="hidden" name="student_id[]" value="{{ $student->id }}">
<input type="hidden" name="college_id" value="{{ $student->college_id }}">
<input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
<input type="hidden" name="section_id" value="{{ $student->section_id }}">
<input type="hidden" name="course_id" value="{{ $course_id }}">

</td>


                                <tr>
                                    @endforeach


          
           
      

</form>
</tbody>
</table>



<button class="btn-sm btn bg-color2" type="submit">submit</button>
</div>
</div>

</div>
    
    </div>

@endif
  


 @include('footer')
