@include('header')
  <div class="wrapper">
    @include('sidebar_doctor')

      <div class="main">
 @include('nav')


  
  
  <div class="container">


  @if ($errors->any())
                    <div class="alert alert-danger" style="width:300px; margin:0px auto">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

     <div class="card">

       <div class="card-body">



<form action="{{url('attendance_report')}}" method="post">
    @csrf
         <div class="row">
 
         <div class="col">
         <label> Course : </label>
         <select name="course_id" id="">
         <option  > Choose Course...</option>
       @foreach($courses_doctors as $course)
        <option value="{{$course->id}}">{{$course->name}}</option>
        @endforeach
     </select>
         </div>
     
          <div class="col">
         <label> Student : </label>
                <select name="student_id"  >

                </select>
          </div>
          

    <div class="col">  
    <label>  Date From : </label>
    <input type="date"  name="from">  
    </div>

    <div class="col">  
    <label>  Date To : </label>
        <input type="date" name="to">
    </div>









 



<!-- end row -->
         </div>

        
         <button type="submit" class="btn btn-sm bg-color2">Search</button>

</form>








@isset($Students)
                <div class="table-responsive mt-2">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-success">Name</th>
                            <th class="alert-success">College</th>
                            <th class="alert-success">Classroom</th>
                            <th class="alert-success">Section</th>
                            <th class="alert-success">Date</th>
                            <th class="alert-warning">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Students as $student)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$student->students->name}}</td>
                                <td>{{$student->college->name}}</td>
                                <td>{{$student->classroom->name}}</td>
                                <td>{{  ( $student->section_id  ? $student->section->name : 'No section'  )}}</td>
                                <td>{{$student->attendence_date}}</td>
                                <td>

                                    @if($student->attendence_status == 0)
                                        <span class="text-danger">Absent</span>
                                    @else
                                        <span class="text-success">Present</span>
                                    @endif
                                </td>
                            </tr>
              
                        @endforeach
                    </table>
                </div>
                @endisset










       </div>




     </div>
  




  </div>
 

  
<script>


$(document).ready(function () {

$('select[name="course_id"]').on('change', function () {
  
    var course_id = $(this).val();
    if(course_id){
        $.ajax({
            url: "{{ URL::to('report_student_search') }}/"+course_id,
            type: "GET",
            dataType: "json",

          success: function(data) {
             $('select[name="student_id"]').empty();
             $('select[name="student_id"]').append('<option value="0" selected  > All </option>');
             $.each(data, function (key, value) { 
                $('select[name="student_id"]').append('<option value="' + key + '">' + value + '</option>')   
             });
          },
        });

    }else {
        console.log('AJAX load did not work');
        }
});
});



</script>





 @include('footer')