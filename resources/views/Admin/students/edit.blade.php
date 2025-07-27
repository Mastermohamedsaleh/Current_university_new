@include('header')
  <div class="wrapper">
    @include('sidebar')

      <div class="main">
 @include('nav')



<h3 class="txt-green text-center mt-4">Update Student</h3>


<div class="cantainer">




<div class="card m-5">


 
<div class="card-body">


 <!-- Message Success -->
 @if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<!-- End Success -->

 <!-- Message Error -->
@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
@endif
 <!-- End Message Error -->



<form action="{{route('students.update',$student->id)}}" method="post">


@method('PUT')
@csrf


<div class="row">


<input type="hidden" value="{{$student->password}}" name="password">


<div class="col-md-6">

<div class="form-group">
 <label>Name : <span class="text-danger">*</span></label>
 <input  type="text" name="name"  value= "{{$student->name}}" >
</div>             
<!-- end one col -->
</div>

<div class="col-md-6">


<div class="form-group">
 <label>Email : <span class="text-danger">*</span></label>
 <input  type="email" name="email"  value= "{{$student->email}}"    require>
</div>   

<!-- end one two -->
</div>



<div class="col-md-6">


<div class="form-group">
 <label>Ssn : <span class="text-danger">*</span></label>
 <input  type="text" name="ssn" value= "{{$student->ssn}}"     require>
</div> 


<!-- end one four -->
</div>

<div class="col-md-6">


<div class="form-group">

<label>College: <span class="text-danger">*</span> </label>
<select name="college_id"   >
        <option value="" >Choose College</option>
            @foreach($colleges as $college) 
          
        <option value="{{$college->id}}" {{ $college->id == $student->college_id ? 'selected' : '' }}  >{{$college->name}}</option>
      
            @endforeach
 </select>


</div> 


<!-- end one five -->
</div>

<div class="col-md-6">


<div class="form-group">

<label>Classroom: <span class="text-danger">*</span> </label>
<select name="classroom_id"   >
    <option value="" disabled>Choose Classroom</option>
       
 </select>


</div> 


<!-- end one six -->
</div>

<div class="col-md-6">


<div class="form-group">

<label>Section: <span class="text-danger">*</span> </label>
<select name="section_id"   >
        <option value="" disabled>Choose Section</option>
 
 </select>


</div> 


<!-- end one seven -->
</div>
<div class="col-md-6">


<div class="form-group">

<label>Gender: <span class="text-danger">*</span> </label>
<select name="gender_id"   >
        <option value="" disabled>Choose Gender</option>
            @foreach($genders as $gender) 
            <option value="{{$gender->id}}" {{ $gender->id == $student->gender_id ? 'selected' : '' }} >{{$gender->type}}</option>
            @endforeach
 </select>


</div> 


<!-- end one eigth -->
</div>
<div class="col-md-6">


<div class="form-group">

<label>Nationalitie: <span class="text-danger">*</span> </label>
<select name="nationalitie_id" >
        <option value="" disabled>Choose Nationalitie</option>
            @foreach($nationalities as $nationalitie) 
            <option value="{{$nationalitie->id}}" {{ $nationalitie->id == $student->nationalitie_id ? 'selected' : '' }}  >{{$nationalitie->nationalitie}}</option>
            @endforeach
 </select>


</div> 


<!-- end one ten -->
</div>
<div class="col-md-6">


<div class="form-group">

<label>Current Year: <span class="text-danger">*</span> </label>
<select class="custom-select mr-sm-2 " name="academic_year" >
                                    <option selected disabled>Choose Year...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}"  >{{ $year }}</option>
                                    @endfor
                                </select>


</div> 


<!-- end one ten -->
</div>





<!-- end Row -->
</div>



 
<button type="submit" class="btn bg-color2 btn-sm m-3">Update</button>
 


</form>










    <!-- end card body -->
</div>





<!-- end card -->
</div>

<!-- end container -->
</div>



<script>
$(document).ready(function () {

    $('select[name="college_id"]').on('change', function () {
      
        var college_id = $(this).val();
        if(college_id){
            $.ajax({
                url: "{{ URL::to('classes') }}/"+college_id,
                type: "GET",
                dataType: "json",

              success: function(data) {
                 $('select[name="classroom_id"]').empty();
                 $.each(data, function (key, value) { 
                    $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>')   
                 });
              },
            });

        }else {
            console.log('AJAX load did not work');
            }
    });


    $('select[name="college_id"]').on('change', function () {

        var college_id = $(this).val();

        if(college_id){
            $.ajax({
                url: "{{ URL::to('getsection') }}/"+college_id,
                type: "GET",
                dataType: "json",

              success: function(data) {
                 $('select[name="section_id"]').empty();
                 $.each(data, function (key, value) { 
                    $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>')   
                 });
              },
            });

        }else{
            console.log('AJAX load did not work');

        }

    });  
});



</script>







@include('footer')
