@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')





<div class="container mt-3">






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







<div class="row">

<form action="{{route('examsschedule.store')}}" method="post">

@csrf
<div class="col-12">

<div class="card">

<div class="card-body">




<div class="row">



<div class="col-4">
    <label>Collge: <span class="text-danger">*</span> </label>

    <select name="college_id" >
    <option value="" >Choose College</option>
@foreach($colleges as $college)
  <option value="{{$college->id}}">{{$college->name}}</option>
@endforeach
</select>

    </div>



    

    <div class="col-4">


    <div class="form-group">

<label>Classroom: <span class="text-danger">*</span> </label>
<select name="classroom_id" >
 <option value="" disabled>Choose Classroom</option>
       
 </select>


</div> 
    

    </div>

    <div class="col-4 ">

    <div class="form-group">

<label>Section: <span class="text-danger">*</span> </label>
<select name="section_id" >
        <option value="" disabled>Choose Classroom</option>
 
 </select>


</div>
    </div>




    <div class="col-4">
<div class="form-group">
<label>Current Year: <span class="text-danger">*</span> </label>
<select class="custom-select mr-sm-2" name="year" >
          @php
              $current_year = date("Y");
          @endphp
          @for($year=$current_year; $year<=$current_year +1 ;$year++)
              <option value="{{ $year}}">{{ $year }}</option>
          @endfor
      </select>
</div> 
</div>

<div class="col-4">
<label>Semester: <span class="text-danger">*</span> </label>
 <select name="semester" id="">
  <option value="semester1">Semester 1</option>
  <option value="semester2">Semester 2</option>
 </select>
</div>










</div>



</div>


</div>





<div class="col-12 mt-3">


<div class="card">

<div class="card-body">
    


       
      
<!-- end body card -->











<div class="create" id="create"></div>








<a href="javascript:void(0)" class="btn bg-color2 addrow mt-3 float-start" id="addrow">+</a>


<button type="submit" class="btn bg-color2 float-end mt-3">Add</button>




</div>


<!-- end card -->
</div>


</div>

<!-- end two Col -->

</div>















</div>

</form>

</div>









<script>
$(document).ready(function(){
  $(".addrow").click(function(){
    var row = `
    <div class="row mt-2">


    <div class="col">
 <label>Course: <span class="text-danger">*</span> </label>
<select name="course_id[]" >
  
    
 </select>
 </div>


    <div class="col">
    
 <label>Exam_date: <span class="text-danger">*</span> </label>
    <input type="date"  name="exam_date[]" >
    </div>

    <div class="col">
 <label>Start_Time: <span class="text-danger">*</span> </label>
    <input type="time" name="start_time[]" >
    </div>

    <div class="col">
      <label>End_Time: <span class="text-danger">*</span> </label>
      <input type="time" name="end_time[]" >
    </div>


  



    <div class="col">
    <label class="text-danger">Delete Row : </label>
     <a hreg="javascript:void(0)" class="btn btn-danger deleteRow" >-</a>
    </div>

    </div>
      `
     $('.create').append(row);

     $(".deleteRow").click(function(){

      $(this).parent().parent().remove();
           
     });


  });
});







// Code Ajax with classroom with course



$(document).ready(function () {

$('select[name="classroom_id"]').on('change', function () {
  
    var classroom_id = $(this).val();
    if(classroom_id){
        $.ajax({
            url: "{{ URL::to('getcourse') }}/"+classroom_id,
            type: "GET",
            dataType: "json",

          success: function(data) {
             $('select[name="course_id[]"]').empty();
             $.each(data, function (key, value) { 
                $('select[name="course_id[]"]').append('<option value="' + key + '">' + value + '</option>')   
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