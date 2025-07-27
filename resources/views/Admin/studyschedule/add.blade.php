@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')





<div class="container mt-3">






@if ($errors->any())
                    <div class="alert alert-danger mb-2" style="width:500px;   margin: 0 auto ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                @if(Session::has('message'))
<p class="alert alert-info mb-2" style="width:500px;   margin: 0 auto ">{{ Session::get('message') }}</p>
@endif
@if(Session::has('danger'))
<p class="alert alert-danger" style="width:500px;   margin: 0 auto ">{{ Session::get('danger') }}</p>
@endif






<div class="row">

<form action="{{route('studyschedule.store')}}" method="post">

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


<button type="submit" class="btn  bg-color2  float-end mt-3">Add</button>




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
   <label>Course_Day: <span class="text-danger">*</span> </label>
    <select   name="course_day[]">
    <option value="sunday">Sunday</option>
    <option value="monday">Monday</option>
    <option value="tuesday">Tuesday</option>
    <option value="wednesday">Wednesday</option>
    <option value="thursday">Thursday</option>
    <option value="friday">Friday</option>
    <option value="saturday">Saturday</option>
</select>
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
      <label>Doctor: <span class="text-danger">*</span> </label>
      <select name="doctor_id[]" >
     @foreach($doctors as $doctor)
      <option value="{{$doctor->id}}">{{$doctor->name}}</option>
       @endforeach
</select>
      


    </div>


    <div class="col">
    <label>Location: <span class="text-danger">*</span> </label>
    <select name="location" >
  <option value="A1">A1</option>
  <option value="A2">A2</option>
  <option value="B1">B1</option>
  <option value="B2">B2</option>
  <option value="C1">C1</option>
  <option value="C2">C2</option>
  <option value="D1">D1</option>
  <option value="D2">D2</option>
</select>
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